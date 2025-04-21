<?php

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
Route::get('/login', function () {
    return view('login');
});
Route::get('/regis', function () {
    return view('regis');
});