<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
  //
  
  public function index(){
    $article_to_check = Article::where('is_accepted', null)->first();
    return view('revisor.index',compact('article_to_check'));
  }
  
  
  // Funzione per accettazione articoli 
  public function accept(Article $article){
    $article->setAccepted(true);
    return redirect()
    ->back()
    ->with('message', "Hai accettato l'articolo $article->title");
  }
  
  // Funzione per rifiuto articoli 
  public function reject(Article $article){
    $article->setAccepted(false);
    return redirect()
    ->back()
    ->with('message', "Hai rifiutato l'articolo $article->title");
  }

  public function undo(){
    $article = Article::whereNotNull('is_accepted')->orderBy('created_at', 'desc')->first();
    $article->setAccepted(null);
    return redirect()
    ->back()
    ->with('message', "Hai riportato in revisione l'articolo $article->title");
  }

  public function work_with_us(){
    return view('workWithUs');
}

  public function becomeRevisor(){
    Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
    return redirect()->back()->with('message', 'Richiesta inviata');
  }
  
  public function makeRevisor (User $user)
  {
    Artisan::call('app:make-user-revisor', ['email' => $user->email]);
    return redirect()->back();
  }
  
  

  // public function ripensamento(Article $article){
  //   if (Auth::user()->is_revisor)
  //   return back();
  // }

}
