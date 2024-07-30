<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get(); return view('welcome', compact('articles'));
    }
    
    public function searchArticles (Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(10); return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }
    
    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function aboutUs() {

        $team = [
            [
                'name' => 'Federico',
                'surname' => 'Petrocchi',
                'age' => 29,
                'img' => '/image/Federico.png',
                'description' => "Gli artigiani della qualità."
            ],
            [
                'name' => 'Francesco',
                'surname' => 'Porro',
                'age' => 30,
                'img' => '/image/Francesco.png',
                'description' => "Da grandi poteri, derivano grandi responsabilità."
            ],
            [
                'name' => 'Riccardo',
                'surname' => 'Mangia',
                'age' => 28,
                'img' => '/image/Riccardo.png',
                'description' => 'Basta che funzioni!'
            ],
            [
                'name' => 'Armando',
                'surname' => 'Moncelli',
                'age' => 28,
                'img' => '/image/Armando.png',
                'description' => "Coloro che sognano di giorno sanno molte cose che sfuggono a chi sogna soltanto di notte."
            ],
        ];
    
        return view(
            'about-us', // Nome della vista che deve renderizzare
            ['collaboratori' => $team] // Questi sono i dati che sto servendo alal vista aboutUs
    );
    }
    
}
