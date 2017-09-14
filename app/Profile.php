<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'city',
        'country',
        'description',
        'twitter_username',
        'facebook_username'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
