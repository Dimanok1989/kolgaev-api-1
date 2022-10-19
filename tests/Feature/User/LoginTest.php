<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/api/user/login', [
            'email' => env("TEST_USER_LOGIN"),
            'password' => env("TEST_USER_PASSWORD"),
        ]);

        $response->assertStatus(200);
    }
}
