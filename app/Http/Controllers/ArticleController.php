<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id)
    {
        $article = Article::findOrFail($id);
        return view('article', compact('article'));
    }
}
