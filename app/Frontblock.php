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
        $ids = explode(',', $this->articles);

        return Article::whereIn('id', $ids)
            ->orderByRaw("field(id,{$this->articles})", $ids)
            ->get();
    }
}
