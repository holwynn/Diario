<?php

namespace App\Jobs;

use Validator;
use App\User;
use App\Profile;

class CreateProfile
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
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'description' => 'nullable|string',
            'twitter_username' => 'nullable|string',
            'facebook_username' => 'nullable|string',
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $profile = $this->user->profile()->create($this->attributes);
        $profile->save();

        return $profile;
    }
}
