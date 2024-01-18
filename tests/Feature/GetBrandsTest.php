<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\BrandSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class GetBrandsTest extends TestCase
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
    public function test_api_get_brand(): void
    {
        $password = $this->faker->password(8);

        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);

        $this->actingAs($user);

        $count_brand = BrandSeeder::countBrands();
        
        $response = $this->get('/api/brand?per_page='.$count_brand);

        $response->assertSuccessful();
        $response->assertJsonCount($count_brand, 'data');
    }
}
