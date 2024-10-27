<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('active', true)->latest('updated_at')->paginate(3);
        return view('article.index', compact('articles'));
    }

    public function category($category)
    {
        $category = ArticleCategory::where('slug', $category)->firstOrFail();
        $articles = Article::where('active', true)->where('category_id', $category->id)->latest('updated_at')->paginate(3);

        return view('article.index', compact('articles', 'category'));
    }

    public function show($category, $article) {
        $article = Article::where('active', true)->where('slug', $article)->firstOrFail();
        return view('article.show', compact('article'));
    }

    public function tag($tag) {
        $articles = Article::where('active', true)->whereJsonContains('tags', $tag)->latest('updated_at')->paginate(3);

        return view('article.index', compact('articles', 'tag'));
    }

    public function search(Request $request) {
        $query = $request->input('query');

        if(!$query || $query == '') {
            abort(404, 'Запрос не найден');
        }

        $articles = Article::where('title', 'like', '%' . $query . '%')
            ->orWhere('detail_text', 'like', '%' . $query . '%')
            ->paginate(6);

        // toDo:rework

        $pageTitle = 'Поиск: ' . $query;

        return view('article.index', compact('articles', 'query', 'pageTitle'));
    }
}


