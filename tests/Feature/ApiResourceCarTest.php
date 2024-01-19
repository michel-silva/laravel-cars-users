<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiResourceCarTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $expected_car_list_json = [
        'data' => [
            '*' => [
                'id',
                'brand_name',
                'version_name',
                'year',
                'price',
            ]
        ]
    ];


    private $expected_car_json = [
        'data' => [
            'id',
            'brand_name',
            'version_name',
            'plate',
            'color',
            'body_type',
            'fuel_type',
            'transmission_type',
            'year',
            'price',
            'created_at',
            'updated_at',
            'deleted_at'
        ]
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }
    
    /**
     * A basic feature test example.
     */
    public function test_api_resource_car(): void
    {
        $password = $this->faker->password(8);

        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);

        $this->actingAs($user);
        
        $car = $this->__processPostCarTest();

        $this->__processGetCarTest();
        $this->__processGetCarIdTest($car->id);
        $this->__processPutCarTest($car->id);
        $this->__processDeleteCarTest($car->id);
    }

    private function __processGetCarTest()
    {
        $response = $this->get('/api/car');
        $response->assertSuccessful();
        $response->assertJsonStructure($this->expected_car_list_json);
    }

    private function __processPostCarTest()
    {
        $brand = Brand::first();
        
        $response = $this->post('/api/car', [
            'brand_id' => $brand->id,
            'version_id' => $brand->versions[0]->id,
            'plate' => 'aaa-0000',
            'color' => 'branco',
            'body_type' => 'SUV',
            'fuel_type' => 'Diesel',
            'transmission_type' => 'Automatico',
            'year' => '1992'
        ]);

        $response->assertSuccessful();
        $response->assertJsonStructure($this->expected_car_json);

        return $response->original;
    }

    private function __processGetCarIdTest(int $car_id)
    {
        $response = $this->get('/api/car/'.$car_id);

        $response->assertSuccessful();
        $response->assertJsonStructure($this->expected_car_json);
    }

    private function __processPutCarTest(int $car_id)
    {
        $response = $this->put('/api/car/'.$car_id, [
            'brand_id' => 1,
            'version_id' => 2,
            'plate' => 'aaa-0000',
            'color' => 'preto',
            'body_type' => 'SUV',
            'fuel_type' => 'Diesel',
            'transmission_type' => 'Automatico',
            'year' => '1992'
        ]);

        $response->assertSuccessful();
        $response->assertJsonStructure($this->expected_car_json);
    }

    private function __processDeleteCarTest(int $car_id)
    {
        $response = $this->delete('/api/car/'.$car_id);

        $response->assertSuccessful();
    }
}
