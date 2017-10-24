<?php

namespace Tests;

use App\User;
use App\Profile;

trait CreatesUsers
{
    protected function createUser($userAttributes = [], $profileAttributes = [])
    {
        $user = factory(User::class)->create($userAttributes);
        $user->profile()->save(factory(Profile::class)->make($profileAttributes));

        return $user;
    }

    protected function createUserWithoutProfile($userAttributes = [])
    {
        return factory(User::class)->create($userAttributes);
    }
}
