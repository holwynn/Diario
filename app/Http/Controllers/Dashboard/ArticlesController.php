<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Article::class);

        $categories = Category::all();

        return view('dashboard.articles.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Article::class);
        $user = Auth::user();

        $data = $this->validate($request, [
            'title' => 'required|string|min:12|max:255',
            'slug' => 'nullable|string|min:12|max:255',
            'content' => 'nullable|string',
            'category_id'=> 'required|integer|exists:categories,id',
            'tags'=> 'nullable|string',
            'status'=> 'required|string',
            'show_image'=> 'required|boolean',
            'image' => 'nullable|image'
        ]);

        $article = $user->articles()->create($data);

        if ($request->file('image')) {
            $path = Storage::putFile('images', $request->file('image'));
            $article->image = $path;
            $article->save();
        }
        
        return redirect()
            ->action('Dashboard\ArticlesController@edit', ['id' => $article->id])
            ->with('message', 'Article created sucessfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('dashboard.articles.edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $data = $this->validate($request, [
            'title' => 'required|string|min:12|max:255',
            'slug' => 'nullable|string|min:12|max:255',
            'content' => 'nullable|string',
            'category_id'=> 'required|integer|exists:categories,id',
            'tags'=> 'nullable|string',
            'status'=> 'required|string',
            'show_image'=> 'required|boolean',
            'image' => 'nullable|image'
        ]);

        $article->update($data);

        if ($request->file('image')) {
            $path = Storage::putFile('images', $request->file('image'));
            $article->image = $path;
            $article->save();
        }

        return redirect()
            ->action('Dashboard\ArticlesController@edit', ['id' => $article->id])
            ->with('message', 'Article updated sucessfully!');
    }

    /**
     * Delete (soft) the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function delete(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();

        return redirect()
            ->action('Dashboard\ArticlesController@edit', ['id' => $article->id])
            ->with('message', 'Article deleted sucessfully!');
    }

    /**
     * Remove (hard) the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('destroy', $article);
        $article->forceDelete();

        return redirect()
            ->action('Dashboard\ArticlesController@index')
            ->with('message', 'Article destroyed sucessfully!');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function restore(Article $article)
    {
        $this->authorize('restore', $article);
        $article->restore();

        return redirect()
            ->action('Dashboard\ArticlesController@edit', ['id' => $article->id])
            ->with('message', 'Article restored sucessfully!');
    }
}
