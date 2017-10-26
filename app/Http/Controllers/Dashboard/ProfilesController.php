<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\UpdateProfile;
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

    public function update(Request $request, Profile $profile)
    {
        $this->authorize('update', $profile);

        $this->dispatchNow(new UpdateProfile($profile, $request->all()));

        return redirect()
            ->action('Dashboard\ProfilesController@edit', ['id' => $profile->id])
            ->with('message', 'Profile updated sucessfully!');
    }
}
