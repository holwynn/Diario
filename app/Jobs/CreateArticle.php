<?php

namespace App\Jobs;

use Auth;
use Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Article;

class CreateArticle
{
    private $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(StoreArticleRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = Auth::user();

        $article = Article::create([
            'title' => $this->request->title,
            'slug' => $this->request->slug,
            'content' => $this->request->content,
            'tags'=> $this->request->tags,
            'status'=> $this->request->status,
            'show_image'=> $this->request->show_image,
            'category_id'=> $this->request->category_id,
            'user_id'=> $user->id,
        ]);

        if ($this->request->file('image')) {
            $path = Storage::putFile('images', $this->request->file('image'));
            $article->image = $path;
            $article->save();
        }

        return $article;
    }
}
