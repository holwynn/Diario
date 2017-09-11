<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;

class IndexController extends Controller
{
    public function index()
    {
        // TODO: do something better
        $usersCount = User::count();
        $articlesCount = Article::count();
        $commentsCount = rand(7, 120);
        $followersCount = rand(2, 56);

        return view('dashboard.index', [
            'usersCount' => $usersCount,
            'articlesCount' => $articlesCount,
            'commentsCount' => $commentsCount,
            'followersCount' => $followersCount
        ]);
    }
}
