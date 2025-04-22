<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $events = Event::get();
        $articles = Article::get();
        return view('home', compact('events', 'articles'));
    }
}
