<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Frontblock extends Model
{
    protected $fillable = [
        'name',
        'articles',
        'rows',
        'columns'
    ];

    public function getArticlesArrayAttribute()
    {
        $ids = explode(',', $this->articles);

        return Article::whereIn('id', $ids)
            ->orderByRaw("field(id,{$this->articles})", $ids)
            ->get();
    }

    public function setColumnsAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['columns'] = serialize($value);
        } else {
            $this->attributes['columns'] = serialize(explode(',', $value));    
        }

        return $this->attributes['columns'];
        
    }

    public function getColumnsAttribute($value)
    {
        return unserialize($value);
    }

    public function getColumnsIntegerAttribute()
    {
        return implode(',', $this->columns);
    }
}
