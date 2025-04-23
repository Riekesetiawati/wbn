<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\EventController as AdminEventController;
use App\Http\Controllers\admin\ArticleController as AdminArticleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/{event}', [EventController::class, 'show'])->name('events.show')->middleware('auth');
Route::post('/register-event', [ParticipantController::class, "registerEvent"])->middleware('auth')->name('register.event');
Route::get('/article/{article}', [ArticleController::class, 'index'])->name('article');

Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/event', [AdminEventController::class, 'index'])->name('admin.event.index');
    Route::get('/event/create', [AdminEventController::class, 'create'])->name('admin.event.create');
    Route::post('/event', [AdminEventController::class, 'store'])->name('admin.event.store');
    Route::get('/event/{event}', [AdminEventController::class, 'show'])->name('admin.event.show');
    Route::get('/event/{event}/edit', [AdminEventController::class, 'edit'])->name('admin.event.edit');
    Route::put('/event/{event}', [AdminEventController::class, 'update'])->name('admin.event.update');
    Route::delete('/event/{event}', [AdminEventController::class, 'destroy'])->name('admin.event.destroy');
    Route::get('/event/{event}/participants', [AdminEventController::class, 'showParticipants'])->name('events.participants');
    Route::get('/event/{event}/company', [CompanyController::class, 'index'])->name('admin.company.index');
    Route::post('/event/company', [CompanyController::class, 'store'])->name('admin.company.store');
    Route::delete('/event/{event}/company', [CompanyController::class, 'destroy'])->name('admin.company.destroy');


    Route::get('/article', [AdminArticleController::class, 'index'])->name('admin.article.index');
    Route::get('/article/create', [AdminArticleController::class, 'create'])->name('admin.article.create');
    Route::post('/article', [AdminArticleController::class, 'store'])->name('admin.article.store');
    Route::get('/article/{article}', [AdminArticleController::class, 'show'])->name('admin.article.show');
    Route::get('/article/{article}/edit', [AdminArticleController::class, 'edit'])->name('admin.article.edit');
    Route::put('/article/{article}', [AdminArticleController::class, 'update'])->name('admin.article.update');
    Route::delete('/article/{article}', [AdminArticleController::class, 'destroy'])->name('admin.article.destroy');

});

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.post');
Route::post('/register', [AuthController::class, 'postRegister'])->middleware('guest')->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
