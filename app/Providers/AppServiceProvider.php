<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $categories = ArticleCategory::where('active', true)->get();
            $latestArticles = Article::where('active', true)->orderBy('created_at', 'desc')->take(3)->get();

            $articleTags = Article::whereNotNull('tags')->pluck('tags')->flatten()->unique();

            $view->with('categories', $categories);
            $view->with('latestArticles', $latestArticles);
            $view->with('articleTags', $articleTags);
        });
    }
}
