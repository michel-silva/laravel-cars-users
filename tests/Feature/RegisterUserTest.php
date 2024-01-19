<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }
    
    /**
     * A basic feature test example.
     */
    public function test_api_create_user(): void
    {
        $password = $this->faker->password(8);

        $response = $this->post('/api/register', [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
        ]);

        $response->assertSuccessful();
    }
}
