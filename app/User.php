<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Profile;
use App\Article;
use App\Editor;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function editors()
    {
        return $this->hasMany(Editor::class);
    }

    public function getRolesAttribute($value)
    {
        return explode(',', $value);
    }

    public function setRolesAttribute($value)
    {
        $this->attributes['roles'] = implode(',', $value);
    }

    /**
     * Get an array of category IDs of which this user is an editor of
     */
    public function getEditorOfAttribute()
    {
        if (!$this->isEditor()) {
            return [];
        }

        $editors = $this->editors;
        $categories = [];

        foreach ($editors as $category) {
            $categories[] = $category->category_id;
        }

        return $categories;
    }

    public function isWriter()
    {
        return in_array('ROLE_WRITER', $this->roles);   
    }

    public function isEditor()
    {
        return in_array('ROLE_EDITOR', $this->roles);
    }

    public function isAdmin()
    {
        return in_array('ROLE_ADMIN', $this->roles);
    }
}
