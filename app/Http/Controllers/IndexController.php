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
        $frontblock = Frontblock::where('name', config('newspaper.frontblock'))
            ->first();

        if ($frontblock) {
            $latestArticles = Article::with('user')
                ->where('status', 'published')
                ->whereNotIn('id', explode(',', $frontblock->articles))
                ->orderBy('id', 'DESC')
                ->take(9)
                ->get();
        } else {
            $latestArticles = [];
        }

        return view('index', [
            'counter' => 0,
            'categories' => Category::all(),
            'frontblock' => $frontblock,
            'latestArticles' => $latestArticles,
        ]);
    }
}
