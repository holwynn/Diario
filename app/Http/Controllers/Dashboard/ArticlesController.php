<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\CreateArticle;
use App\Jobs\UpdateArticle;
use App\Http\Requests\ListArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Queries\ListArticles;
use App\Article;
use App\Category;

class ArticlesController extends Controller
{
    public function index(ListArticleRequest $request, $paginate = 10)
    {
        $this->authorize('list', Article::class);
        
        $articles = ListArticles::dashboard($request, $paginate);

        return view('dashboard.articles.list', [
            'categories' => Category::all(),
            'articles' => $articles
        ]);
    }

    public function create()
    {
        $this->authorize('create', Article::class);

        return view('dashboard.articles.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        $this->authorize('create', Article::class);
        
        $article = $this->dispatchNow(new CreateArticle($request));
        
        return redirect()
            ->action('Dashboard\ArticlesController@edit', ['id' => $article->id])
            ->with('message', 'Article created sucessfully!');
    }

    public function edit(Article $article)
    {
        // Let's not restrict writers from viewing the edit form of
        // articles not belonging to them. Even if they try to submit changes,
        // an auth exception will trigger in update().

        //$this->authorize('update', $article);

        return view('dashboard.articles.edit', [
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);

        $this->dispatchNow(new UpdateArticle($article, $request));

        return redirect()
            ->action('Dashboard\ArticlesController@edit', ['id' => $article->id])
            ->with('message', 'Article updated sucessfully!');
    }

    public function delete(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()
            ->action('Dashboard\ArticlesController@edit', ['id' => $article->id])
            ->with('message', 'Article deleted sucessfully!');
    }

    public function destroy(Article $article)
    {
        $this->authorize('destroy', $article);

        $article->forceDelete();

        return redirect()
            ->action('Dashboard\ArticlesController@index')
            ->with('message', 'Article destroyed sucessfully!');
    }

    public function restore(Article $article)
    {
        $this->authorize('restore', $article);
        
        $article->restore();

        return redirect()
            ->action('Dashboard\ArticlesController@edit', ['id' => $article->id])
            ->with('message', 'Article restored sucessfully!');
    }
}
