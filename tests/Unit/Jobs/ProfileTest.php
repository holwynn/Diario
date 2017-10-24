<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\StoreProfileRequest;
use App\Jobs\CreateProfile;
use App\Jobs\UpdateProfile;
use App\profile;

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

    public function testCreateProfileFromRequest()
    {
        $user = $this->createUserWithoutProfile();

        $request = StoreProfileRequest::createFromGlobals();
        $request->first_name = 'Teston';

        $job = CreateProfile::fromRequest($request, $user);
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

    /**
     * @depends testCreateProfileFromRequest
     */
    public function testUpdateProfileFromRequest($profile)
    {
        $request = UpdateProfileRequest::createFromGlobals();
        $request->first_name = 'Teston';

        $job = UpdateProfile::fromRequest($request, $profile);
        $profile = $job->handle();

        $this->assertInstanceOf(Profile::class, $profile);
        $this->assertEquals('Teston', $profile->first_name);
    }
}
