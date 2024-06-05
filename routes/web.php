<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/articles', [PublicController::class, 'allArticle'])->name('article.all');
Route::get('/articles/category/{category}' , [ArticleController::class, 'categoryArticle'])->name('article.category');

Route::middleware(['auth'])->group(function(){
    Route::get('/article/create' , [ArticleController::class, 'create'])->name('article.create');
    Route::get('/article/index/{user}' , [ArticleController::class , 'index'])->name('article.index');
    Route::get('article/show/{article}' , [ArticleController::class , 'show'])->name('article.show');
    Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
    Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
    Route::get('/revisor/request' , [RevisorController::class,'becomeRevisor'])->name('become.revisor');
    Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
    Route::patch('/undo/{article}', [RevisorController::class, 'undo'])->name('undo');

    // Route::get('/revisor/form',[RevisorController::class, 'formRevisor'])->name('form.revisor');
});

Route::get('/revisor/index' , [RevisorController::class , 'index'])->middleware('isRevisor')->name('revisor.index');
Route::get('/search/article',[PublicController::class, 'searchArticles'])->name('article.search');
Route::post('/lingua/{lang}', [PublicController::class,'setLanguage'])->name('setLocale');



