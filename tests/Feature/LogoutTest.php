<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class LogoutTest extends TestCase
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
    public function test_api_logout(): void
    {
        $password = $this->faker->password(8);

        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);
        
        Sanctum::actingAs($user); 
        $user->currentAccessToken()->shouldReceive('delete')->once();

        $res = $this->post('/api/logout');

        $res->assertOk();
    }
}
