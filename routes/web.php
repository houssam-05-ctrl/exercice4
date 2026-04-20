<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::inertia('/', 'welcome')->name('home');

// Afficher le formulaire
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

// Traiter le formulaire
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

// Afficher la liste des articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
