<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Frontblock;
use App\Article;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        $frontblock = Frontblock::where('name', config('newspaper.frontblock'))
            ->first();

        $latestArticles = Article::with('user')
            ->whereNotIn('id', explode(',', $frontblock->articles))
            ->orderBy('id', 'DESC')
            ->take(9)
            ->get();

        return view('index', [
            'categories' => $categories,
            'frontblock' => $frontblock,
            'latestArticles' => $latestArticles,
        ]);
    }
}
