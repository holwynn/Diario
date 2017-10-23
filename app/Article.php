<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Category;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'tags',
        'content',
        'status',
        'image',
        'show_image',
        'category_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

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
        $remove = ['.', '$', ';', ':', '"', '?', '<', '>', '-'];
        $subject = str_replace($remove, '', strtolower($this->title));
        return trim(str_replace([' ', '--'], '-', $subject), '-');
    }
}