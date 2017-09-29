# Controller namespace order
1. Laravel aliases
2. Laravel internals
3. Application services
4. Application requests
5. Application queries
5. Application models

Example
~~~
<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminte\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Queries\ListArticles;
use App\Article;
use App\Category;
~~~