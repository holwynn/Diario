<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomepageWorks()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(config('newspaper.name'));
    }
}
