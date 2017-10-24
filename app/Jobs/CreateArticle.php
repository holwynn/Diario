<?php

namespace App\Jobs;

use Auth;
use Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Article;

class CreateArticle
{
    private $user;
    private $attributes = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user = null, $attributes = [])
    {
        if ($user === null) {
            $this->user = Auth::user();
        } else {
            $this->user = $user;
        }

        foreach ($attributes as $key => $value) {
            $this->set($key, $value);
        }
    }

    public static function fromRequest(StoreArticleRequest $request, $user = null)
    {
        return new static($user, [
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
        $article = new Article([
            'title' => $this->get('title'),
            'slug' => $this->get('slug'),
            'content' => $this->get('content'),
            'tags'=> $this->get('tags'),
            'status'=> $this->get('status'),
            'show_image'=> $this->get('show_image'),
            'category_id'=> $this->get('category_id'),
            'user_id'=> $this->user->id,
        ]);

        $article->save();

        // TODO: This really should be in some sort of Media model
        // if ($this->request->file('image')) {
        //     $path = Storage::putFile('images', $this->request->file('image'));
        //     $article->image = $path;
        //     $article->save();
        // }

        return $article;
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