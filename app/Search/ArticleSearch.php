<?php

namespace App\Search;

use App\Article;

class ArticleSearch
{
    /**
     * Article search rules for dashbord index
     */
    public static function dashboardIndex($request, $paginate)
    {
        $query = Article::with('user.profile');

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
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