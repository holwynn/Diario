<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function show($categoryName)
    {
        $articles = Category::where('name', $categoryName)
            ->firstOrFail()
            ->articles()
            ->where('status', 'published')
            ->orderBy('id', 'DESC')
            ->get();

        return view('category', [
            'category' => $categoryName,
            'categories' => Category::all(),
            'articles' => $articles,
        ]);
    }
}
