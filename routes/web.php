<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//CREATE
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');

//INDEX
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

//DETTAGLIO ARTICOLO
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');

//EDIT
Route::get('/edit/article/{article}', [ArticleController::class, 'edit'])->name('article.edit');
//UPDATE
// Route::put('/update/article/{article}', [ArticleController::class, 'update'])->name('article.update');

//CATEGORIE
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

// REVISOR
Route::get('revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');


//ROTTA DI ACCETTAZIONE ARTICOLI
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');

//ROTTA DI RIFIUTO ARTICOLI
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');

//ROTTA INVIO MAIL REVISORE
Route::post('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

//ROTTA PER RENDERE REVISORE UN UTENTE
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//ROTTA PER LA PAGINA "LAVORA CON NOI"
Route::get('/revisor/work-with-us', [RevisorController::class, 'work_with_us'])->name('workWithUs');


//ROTTA PER LA RICERCA ARTICOLI
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');

//ANNULLARE L'ULTIMA OPERAZIONE (REVISORE)
Route::patch('/undo', [RevisorController::class, 'undo'])->name('undo');

//ELIMINAZIONE ARTICOLO (UTENTE)
Route::delete('/destroy/{article}', [ArticleController::class, 'destroy'])->name('destroy');

// rotta per cambiare lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

//rotta per l'about-us
Route::get('/about-us', [PublicController::class, 'aboutUs'])->name('aboutUs');
// Route::delete('/images/{image}', [ArticleController::class, 'destroyImg'])->name('images.destroy');