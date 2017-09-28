<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\ProfileService;
use App\Profile;

class ProfilesController extends Controller
{
    public function edit(Profile $profile)
    {
        $this->authorize('view', $profile);

        return view('dashboard.profiles.edit', [
            'profile' => $profile
        ]);
    }

    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $this->authorize('update', $profile);

        ProfileService::update($request, $profile);

        return redirect()
            ->action('Dashboard\ProfilesController@edit', ['id' => $profile->id])
            ->with('message', 'Profile updated sucessfully!');
    }
}
