<?php

namespace App\Jobs;

use App\Http\Requests\UpdateProfileRequest;
use App\Profile;

class UpdateProfile
{
    private $profile;
    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Profile $profile, UpdateProfileRequest $request)
    {
        $this->profile = $profile;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->profile->update([
            'first_name' => $this->request->first_name,
            'last_name' => $this->request->last_name,
            'address' => $this->request->address,
            'city' => $this->request->city,
            'country' => $this->request->country,
            'description' => $this->request->description,
            'twitter_username' => $this->request->twitter_username,
            'facebook_username' => $this->request->facebook_username,
        ]);

        return $this->profile;
    }
}
