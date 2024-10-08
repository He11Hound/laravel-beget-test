<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return 'index article';
        return view('indexArticle');
    }

    public function category($category)
    {
        return 'index article';
        return view('categoryArticle');
    }

    public function show($category, $article) {
        return 'showArticle';
        return  view('showArticle');
    }

    public function tag($tag) {
        return 'tagArticle';
        return  view('tagArticle');
    }
}


