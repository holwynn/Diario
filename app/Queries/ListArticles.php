<?php

namespace App\Queries;

use Illuminate\Http\Request;
use App\Article;

class ListArticles
{
    public static function dashboard(Request $request, $paginate = 10)
    {
        $request->validate([
            'status' => 'nullable|string',
            'title' => 'nullable|string',
            'id' => 'nullable|numeric',
            'paginate' => 'nullable|numeric',
            'trashed' => 'nullable|bool',
            'category_id' => 'nullable|integer|exists:categories,id',
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
        
        return $query->paginate($paginate);
    }
}