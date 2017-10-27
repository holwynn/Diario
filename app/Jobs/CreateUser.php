<?php

namespace App\Jobs;

use Validator;
use App\User;

class CreateUser
{
    private $attributes;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * Define job validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Validator::make($this->attributes, $this->rules())->validate();
        
        $user = new User($this->attributes);
        $user->password = bcrypt($this->attributes['password']);
        $user->save();

        return $user;
    }
}
