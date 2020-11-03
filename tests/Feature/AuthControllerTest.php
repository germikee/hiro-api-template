<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_get_authenticated_user_information()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->json('GET', 'api/auth')
            ->assertJsonStructure([
                'data' => ['id', 'name', 'email'],
            ]);
    }
}
