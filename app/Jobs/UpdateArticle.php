<?php

namespace App\Jobs;

use Auth;
use Storage;
use App\Http\Requests\UpdateArticleRequest;
use App\Article;

class UpdateArticle
{
    private $article;
    private $attributes = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article, $attributes = [])
    {
        $this->article = $article;
        
        foreach ($attributes as $key => $value) {
            $this->set($key, $value);
        }
    }

    public static function fromRequest(UpdateArticleRequest $request, Article $article)
    {
        return new static($article, [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'tags' => $request->tags,
            'status' => $request->status,
            'show_image' => $request->show_image,
            'category_id' => $request->category_id
        ]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->article->update([
            'title' => $this->get('title'),
            'slug' => $this->get('slug'),
            'content' => $this->get('content'),
            'tags'=> $this->get('tags'),
            'status'=> $this->get('status'),
            'show_image'=> $this->get('show_image'),
            'category_id'=> $this->get('category_id'),
        ]);

        // TODO: This really should be in some sort of Media model
        // if ($this->request->file('image')) {
        //     $path = Storage::putFile('images', $this->request->file('image'));
        //     $article->image = $path;
        //     $article->save();
        // }

        return $this->article;
    }

    private function set($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    private function get($key)
    {
        if (isset($this->attributes[$key])) {
            return $this->attributes[$key];
        } else {
            return null;
        }
    }
}