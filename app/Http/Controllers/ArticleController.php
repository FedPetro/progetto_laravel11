<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
    
    public static function middleware() : array {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }
    
    public function create() {
        return view('article.create');
    }
    
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10); 
        return view('article.index', compact('articles'));
    }
    
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    public function edit(Article $article)
    {
        // $article = Article::all();
        // $category = Category::all();
        return view('article.edit',compact('article'));
    }

    // public function update(Request $request, Article $article)
    // {
    //     //
    //     $img = $article->img; //valore dell'immagine originale/precedente
    //     if ($request->file('img')) { //se mi viene passata una nuova immagine
    //         $img = $request->file('img')->store('public/image/default.jpg'); //la sovrascrivo alla precedente
    //     }
    //     $article->update([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'price'=> $request->price,
    //         'category_id'=> $request->category,
    //         'img' => $img, //salvo immagine che può essere la precedente o la nuova
    //         'user_id' => Auth::user()->id
    //     ]);
    //     $article->tags()->sync($request->tags); //sync è un metodo che aggiorna l'id passato. Quello passato se era presente viene eliminato come relazione, quello mancante viene aggiunto come se fosse un attach

    //     return redirect(route('article.index'))->with('message','Articolo aggiornato!');
    // }
    
    public function byCategory(Category $category)
    {
        $articles = $category->articles->where('is_accepted', true);
        return view('article.byCategory', compact('articles', 'category'));
    }
    
    public function destroy(Article $article)
    {
        if (Auth::id() == $article->user->id)
        $article->delete();
        // return redirect()->back()->with('message', "l'articolo è stato cancellato"); ritorna a pagina precedente
        return redirect()->route('homepage')->with('message', "L'articolo è stato cancellato");
    }

   
}