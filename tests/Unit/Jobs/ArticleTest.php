<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

        // Dont forget to ->save()!
        $this->assertInternalType('int', $article->id);

        return $article;
    }

    /**
     * @depends testCreateArticle
     */
    public function testUpdateArticle($article)
    {
        $job = new UpdateArticle($article, ['title' => 'New article title']);
        $article = $job->handle();

        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals('New article title', $article->title);
    }
}