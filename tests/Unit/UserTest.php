<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    public function testAssertsAdmin()
    {
        $user = factory(\App\User::class)->create(['roles' => ['ROLE_ADMIN']]);

        $this->assertTrue($user->isAdmin());
    }

    public function testAssertsEditor()
    {
        $user = factory(\App\User::class)->create(['roles' => ['ROLE_EDITOR']]);

        $this->assertTrue($user->isEditor());
    }

    public function testAssertsWriter()
    {
        $user = factory(\App\User::class)->create(['roles' => ['ROLE_WRITER']]);

        $this->assertTrue($user->isWriter());
    }
}
