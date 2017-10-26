<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\CreateUser;
use App\Jobs\UpdateUser;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUser()
    {
        $job = new CreateUser([
            'name' => 'test name',
            'email' => 'test@email.com',
            'password' => 'secret123',
        ]);
        $user = $job->handle();

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('test name', $user->name);

        return $user;
    }

    /**
     * @depends testCreateUser
     */
    public function testUpdateUser($user)
    {
        $oldPassword = $user->password;

        $job = new UpdateUser($user, [
            'email' => 'new@email.com',
            'current_password' => 'secret123'
        ]);
        $user = $job->handle();

        $this->assertInstanceOf(User::class, $user['user']);
        $this->assertEquals('new@email.com', $user['user']->email);
        $this->assertEquals($oldPassword, $user['user']->password);
    }
}
