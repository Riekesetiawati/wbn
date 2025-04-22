<?php

use App\Http\Controllers\admin\ArticleController as AdminArticleController;
use App\Http\Controllers\admin\EventController as AdminEventController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/event', function () {
    return view('event');
});
Route::get('/article', function () {
    return view('article');
});
Route::get('/regis', function () {
    return view('regis');
});

Route::prefix('admin')->group(function () {
    Route::get('/event', [AdminEventController::class, 'index'])->name('admin.event.index');
    Route::get('/event/create', [AdminEventController::class, 'create'])->name('admin.event.create');
    Route::post('/event', [AdminEventController::class, 'store'])->name('admin.event.store');
    Route::get('/event/{event}', [AdminEventController::class, 'show'])->name('admin.event.show');
    Route::get('/event/{event}/edit', [AdminEventController::class, 'edit'])->name('admin.event.edit');
    Route::put('/event/{event}', [AdminEventController::class, 'update'])->name('admin.event.update');
    Route::delete('/event/{event}', [AdminEventController::class, 'destroy'])->name('admin.event.destroy');


    Route::get('/article', [AdminArticleController::class, 'index'])->name('admin.article.index');
    Route::get('/article/create', [AdminArticleController::class, 'create'])->name('admin.article.create');
    Route::post('/article', [AdminArticleController::class, 'store'])->name('admin.article.store');
    Route::get('/article/{article}', [AdminArticleController::class, 'show'])->name('admin.article.show');
    Route::get('/article/{article}/edit', [AdminArticleController::class, 'edit'])->name('admin.article.edit');
    Route::put('/article/{article}', [AdminArticleController::class, 'update'])->name('admin.article.update');
    Route::delete('/article/{article}', [AdminArticleController::class, 'destroy'])->name('admin.article.destroy');
});

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
