<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function testRequiresLogin()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function testRedirectsToHomeIfUnauthorized()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertRedirect('/');
    }

    public function testAllowsAccessToAdmins()
    {
        $user = factory(\App\User::class)->create(['roles' => ['ROLE_ADMIN']]);
        $user->profile()->save(factory(\App\Profile::class)->make());
 
        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }

    public function testAllowsAccessToEditors()
    {
        $user = factory(\App\User::class)->create(['roles' => ['ROLE_EDITOR']]);
        $user->profile()->save(factory(\App\Profile::class)->make());

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }

    public function testAllowsAccessToWriters()
    {
        $user = factory(\App\User::class)->create(['roles' => ['ROLE_WRITER']]);
        $user->profile()->save(factory(\App\Profile::class)->make());

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }
}
