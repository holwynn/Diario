<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class ArticlesController extends Controller
{
    public function show($title = '', Article $article)
    {
        if ($article->trashed() || $article->status === 'draft') {
            abort(404);
        }

        // don't allow users to modify the optional title segment
        // if they do, redirect them to the correct URI
        if ($article->seourl() !== $title) {
            return redirect()
                ->route('article', [
                    'title' => $article->seoUrl(), 
                    'article' => $article]
                );
        }

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
            'categories' => Category::all(),
            'article' => $article,
            'relatedArticles' => $relatedArticles
        ]);
    }
}
