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
        $user = $this->createUser();

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertRedirect('/');
    }

    public function testAllowsAccessToAdmins()
    {
        $user = $this->createUser(['roles' => ['ROLE_ADMIN']]);
 
        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }

    public function testAllowsAccessToEditors()
    {
        $user = $this->createUser(['roles' => ['ROLE_EDITOR']]);

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }

    public function testAllowsAccessToWriters()
    {
        $user = $this->createUser(['roles' => ['ROLE_WRITER']]);

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }
}
