<?php

namespace App\Services;

use Auth;
use App\Http\Requests\UpdateUserRequest;
use App\User;

class UserService
{
    public function update(UpdateUserRequest $request, User $user)
    {
        $message = '';

        if (app('hash')->check($request->current_password, $user->password)) {
            if (!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }

            $user->email = $request->email;
            $user->save();

            $message = 'Settings updated successfuly!';
        } else {
            $message = 'Incorrect password';
        }

        return [
            'user' => $user, 
            'message' => $message
        ];
    }
}