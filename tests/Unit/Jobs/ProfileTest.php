<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\CreateProfile;
use App\Jobs\UpdateProfile;
use App\Profile;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateProfile()
    {
        $user = $this->createUserWithoutProfile();

        $job = new CreateProfile($user, ['first_name' => 'Teston']);
        $profile = $job->handle();

        $this->assertInstanceOf(Profile::class, $profile);
        $this->assertEquals('Teston', $profile->first_name);

        return $profile;
    }

    /**
     * @depends testCreateProfile
     */
    public function testUpdateProfile($profile)
    {
        $job = new UpdateProfile($profile, ['first_name' => 'Teston']);
        $profile = $job->handle();

        $this->assertInstanceOf(Profile::class, $profile);
        $this->assertEquals('Teston', $profile->first_name);
    }
}
