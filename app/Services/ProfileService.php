<?php

namespace App\Services;

use Auth;
use App\Http\Requests\UpdateProfileRequest as UpdateRequest;
use App\Profile;

class ProfileService
{
    public static function update(UpdateRequest $request, Profile $profile)
    {
        $profile->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'description' => $request->description,
            'twitter_username' => $request->twitter_username,
            'facebook_username' => $request->facebook_username,
        ]);
    }
}