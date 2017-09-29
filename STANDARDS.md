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

# View variables

Define an array as the second argument to view(). Don't assign variables beforehand if the data can be accessed using a simple operation (i.e. single method eloquent call).

Example

Simple operation, no need to assign $categories beforehand
~~~
return view('categories', [
    'categories' => Category::all()
]);
~~~

Not a simple operation
~~~
$categories = Category::with('articles')
    ->pagiante(10);
    
return view('categories', [
    'categories' => $categories
]);
~~~

Both
~~~
$articles = Article::with('user.profile')
    ->where('status', 'draft')
    ->get();

return view('articles', [
    'categories' => Category::all(),
    'articles' => $articles
]);
~~~