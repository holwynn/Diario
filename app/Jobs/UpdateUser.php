<?php

namespace App\Jobs;

use Validator;
use App\User;

class UpdateUser
{
    private $user;
    private $attributes;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $attributes = [])
    {
        $this->user = $user;
        $this->attributes = $attributes;

        Validator::make($this->attributes, $this->rules())->validate();
    }

    /**
     * Define job validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'required|string',
            'password' => 'nullable|string',
            'email' => 'required|email',
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (app('hash')->check($this->attributes['current_password'], $this->user->password)) {
            if (!empty($this->attributes['password'])) {
                $this->user->password = bcrypt($this->attributes['password']);
            }
            $this->user->email = $this->attributes['email'];
            $this->user->save();
            $message = 'Settings updated successfuly!';
        } else {
            $message = 'Incorrect password';
        }
        
        return [
            'user' => $this->user, 
            'message' => $message
        ];
    }
}
