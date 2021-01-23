<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_login_user()
    {
        $user = User::factory()->create();

        $response = $this->json('POST', 'api/login', [
            'email' => $user->email,
            'password' => 'password',
        ])
        ->assertOk()
        ->assertJsonStructure([
            'data' => ['id', 'name', 'email'],
        ]);
    }

    /** @test */
    public function it_should_allow_user_to_login_using_username()
    {
        $user = User::factory()->create();

        $response = $this->json('POST', 'api/login', [
            'username' => $user->username,
            'password' => 'password',
        ])
        ->assertOk()
        ->assertJsonStructure([
            'data' => ['id', 'name', 'email'],
        ]);
    }
}
