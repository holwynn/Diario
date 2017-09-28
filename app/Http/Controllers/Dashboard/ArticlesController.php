<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Article;
use App\Category;

class ArticlesController extends Controller
{
    public function index(Request $request, $paginate = 10)
    {
        $categories = Category::all();

        $this->validate($request, [
            'status' => 'nullable|string',
            'title' => 'nullable|string',
            'id' => 'nullable|numeric',
            'paginate' => 'nullable|numeric',
            'trashed' => 'nullable|bool',
            'category_id' => 'nullable|integer|exists:categories,id'
        ]);

        $query = Article::with('user.profile');

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('paginate')) {
            $paginate = $request->input('paginate');
        }

        if ($request->filled('title')) {
            $query->where('title', 'LIKE', '%'.$request->input('title').'%');
        }

        if ($request->filled('id')) {
            $query->where('id', $request->input('id'));
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->input('trashed')) {
            $query->withTrashed();
        }

        $query->orderBy('id', 'DESC');
        $articles = $query->paginate($paginate);

        return view('dashboard.articles.list', [
            'categories' => $categories,
            'articles' => $articles
        ]);
    }

    public function create()
    {
        $this->authorize('create', Article::class);

        $categories = Category::all();

        return view('dashboard.articles.create', [
            'categories' => $categories
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        $this->authorize('create', Article::class);
        
        $article = ArticleService::store($request);
        
        return redirect()
            ->action('Dashboard\ArticlesController@edit', ['id' => $article->id])
            ->with('message', 'Article created sucessfully!');
    }

    public function edit(Article $article)
    {
        // Let's not restrict writers from viewing the edit form of
        // articles not belonging to them. Even if they try to submit changes,
        // an auth exception will trigger in update()

        //$this->authorize('edit', $article);

        $categories = Category::all();

        return view('dashboard.articles.edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);

        ArticleService::update($request, $article);

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
