<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Jobs\CreateArticle;
use App\Jobs\UpdateArticle;
use App\Article;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateArticle()
    {
        $user = $this->createUser();

        $job = new CreateArticle($user, ['title' => 'Article title']);
        $article = $job->handle();

        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals('Article title', $article->title);

        return $article;
    }
    
    public function testCreateArticleFromRequest()
    {
        $user = $this->createUser();

        $request = StoreArticleRequest::createFromGlobals();
        $request->title = 'Article title';

        $job = CreateArticle::fromRequest($request, $user);
        $article = $job->handle();

        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals('Article title', $article->title);

        return $article;
    }

    /**
     * @depends testCreateArticle
     */
    public function testUpdateArticle($article)
    {
        $job = new UpdateArticle($article, ['title' => 'New title']);
        $article = $job->handle();

        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals('New title', $article->title);
    }

    /**
     * @depends testCreateArticleFromRequest
     */
    public function testUpdateArticleFromRequest($article)
    {
        $request = UpdateArticleRequest::createFromGlobals();
        $request->title = 'New title';

        $job = UpdateArticle::fromRequest($request, $article);
        $article = $job->handle();

        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals('New title', $article->title);
    }
}