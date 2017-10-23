<?php

namespace App\Jobs;

use App\Http\Requests\UpdateUserRequest;
use App\User;

class UpdateUser
{
    private $user;
    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, UpdateUserRequest $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = '';

        if (app('hash')->check($this->request->current_password, $this->user->password)) {
            if (!empty($this->request->password)) {
                $this->user->password = bcrypt($this->request->password);
            }

            $this->user->email = $this->request->email;
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
