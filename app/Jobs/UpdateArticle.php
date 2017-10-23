<?php

namespace App\Jobs;

use Auth;
use Storage;
use App\Http\Requests\UpdateArticleRequest;
use App\Article;

class UpdateArticle
{
    private $article;
    private $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article, UpdateArticleRequest $request)
    {
        $this->article = $article;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->article->update([
            'title' => $this->request->title,
            'slug' => $this->request->slug,
            'content' => $this->request->content,
            'tags'=> $this->request->tags,
            'status'=> $this->request->status,
            'show_image'=> $this->request->show_image,
            'category_id'=> $this->request->category_id,
        ]);

        if ($this->request->file('image')) {
            $path = Storage::putFile('images', $this->request->file('image'));
            $article->image = $path;
            $article->save();
        }

        return $this->article;
    }
}
