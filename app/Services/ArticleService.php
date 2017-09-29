<?php

namespace App\Services;

use Auth;
use Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Article;

class ArticleService
{
    public function create(StoreArticleRequest $request)
    {
        $user = Auth::user();

        $article = $user->articles()->create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id'=> $request->category_id,
            'tags'=> $request->tags,
            'status'=> $request->status,
            'show_image'=> $request->show_image,
        ]);

        if ($request->file('image')) {
            $path = Storage::putFile('images', $request->file('image'));
            $article->image = $path;
            $article->save();
        }

        return $article;

    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id'=> $request->category_id,
            'tags'=> $request->tags,
            'status'=> $request->status,
            'show_image'=> $request->show_image,
        ]);

        if ($request->file('image')) {
            $path = Storage::putFile('images', $request->file('image'));
            $article->image = $path;
            $article->save();
        }

        return $article;
    }
}