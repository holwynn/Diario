<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Article;
use App\Editor;

class Category extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function editors()
    {
        return $this->hasMany(Editor::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
