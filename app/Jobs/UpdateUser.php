<?php

namespace App\Jobs;

use App\Http\Requests\UpdateUserRequest;
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
        
        foreach ($attributes as $key => $value) {
            $this->set($key, $value);
        }
    }

    public static function fromRequest(UpdateUserRequest $request, $user)
    {
        return new static($user, [
            'current_password' => $request->current_password,
            'password' => $request->password,
            'email' => $request->email
        ]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = '';

        if (app('hash')->check($this->get('current_password'), $this->user->password)) {
            if (!empty($this->get('password'))) {
                $this->user->password = bcrypt($this->get('password'));
            }

            $this->user->email = $this->get('email');
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

    private function set($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    private function get($key)
    {
        if (isset($this->attributes[$key])) {
            return $this->attributes[$key];
        } else {
            return null;
        }
    }
}
