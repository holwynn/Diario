<?php

namespace App\Jobs;

use Auth;
use App\Http\Requests\StoreProfileRequest;
use App\User;

class CreateProfile
{
    private $user;
    private $attributes;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user = null, $attributes = [])
    {
        if ($user === null) {
            $this->user = Auth::user();
        } else {
            $this->user = $user;
        }
        
        foreach ($attributes as $key => $value) {
            $this->set($key, $value);
        }
    }

    public static function fromRequest(StoreProfileRequest $request, $user = null)
    {
        return new static($user, [
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

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->profile()->create([
            'first_name' => $this->get('first_name'),
            'last_name' => $this->get('last_name'),
            'address' => $this->get('address'),
            'city' => $this->get('city'),
            'country' => $this->get('country'),
            'description' => $this->get('description'),
            'twitter_username' => $this->get('twitter_username'),
            'facebook_username' => $this->get('facebook_username'),
        ]);

        return $this->user->profile;
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
