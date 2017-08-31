<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Frontblock extends Model
{
    protected $fillable = [
        'name',
        'articles'
    ];

    public function getArticlesArrayAttribute()
    {
        return Article::whereIn('id', explode(',', $this->articles))
            ->get();
    }
}
