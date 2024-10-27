<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $pageTitle = 'Главная';
        $articles = Article::where('active', true)->latest('updated_at')->paginate(6);
        return view('index', compact('articles', 'pageTitle'));
    }

    public function about()
    {
        return view('about');
    }
}
