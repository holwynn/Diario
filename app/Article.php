<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'tags',
        'content',
        'status',
        'image',
        'show_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seoUrl()
    {
        return 'wip';
    }
}