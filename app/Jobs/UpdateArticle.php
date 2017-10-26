<?php

namespace App\Jobs;

use Storage;
use Validator;
use App\Article;

class UpdateArticle
{
    private $article;
    private $attributes;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article, $attributes = [])
    {
        $this->article = $article;
        $this->attributes = $attributes;

        Validator::make($this->attributes, $this->rules())->validate();
    }

    /**
     * Define job validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:12|max:255',
            'slug' => 'nullable|string|min:12|max:255',
            'content' => 'nullable|string',
            'category_id'=> 'nullable|integer|exists:categories,id',
            'tags'=> 'nullable|string',
            'status'=> 'nullable|string',
            'show_image'=> 'nullable|boolean',
            'image' => 'nullable|image',
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->article->update($this->attributes);

        // TODO: This really should be in some sort of Media model
        // if ($this->request->file('image')) {
        //     $path = Storage::putFile('images', $this->request->file('image'));
        //     $article->image = $path;
        //     $article->save();
        // }

        return $this->article;
    }
}