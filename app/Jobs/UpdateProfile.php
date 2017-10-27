<?php

namespace App\Jobs;

use Validator;
use App\Profile;

class UpdateProfile
{
    private $profile;
    private $attributes;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Profile $profile, $attributes = [])
    {
        $this->profile = $profile;
        $this->attributes = $attributes;
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
        Validator::make($this->attributes, $this->rules())->validate();
        
        $this->profile->update($this->attributes);

        return $this->profile;
    }
}
