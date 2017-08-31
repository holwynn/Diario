<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class ArticlesController extends Controller
{
    public function show($title = '', Article $article)
    {
        $categories = Category::all();
        $article = $article->load('user');

        $relatedArticles = Article::where([
                ['category_id', $article->category->id],
                ['id', '<>', $article->id],
                ['status', 'published']
            ])
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();

        return view('article', [
            'categories' => $categories,
            'article' => $article,
            'relatedArticles' => $relatedArticles
        ]);
    }
}
