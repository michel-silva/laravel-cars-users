<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiResourceUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $expected_user_list_json = [
        'data' => [
            '*' => [
                'id',
                'name',
            ]
        ]
    ];


    private $expected_user_json = [
        'data' => [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ]
    ];

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /**
     * A basic feature test example.
     */
    public function test_api_resource_user(): void
    {
        $password = $this->faker->password(8);

        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);

        $car = Car::factory()->create();

        $this->actingAs($user);
        
        $user = $this->__processPostUserTest();

        $this->__processGetUserTest();
        $this->__processGetUserIdTest($user->id);
        $this->__processPutUserTest($user->id);

        $this->__processAssignCarTest($user->id, $car->id);
        $this->__processUserCarsTest($user->id);
        $this->__processUnassignCarTest($user->id, $car->id);

        $this->__processDeleteUserTest($user->id);
    }

    private function __processGetUserTest()
    {
        $response = $this->get('/api/user');
        $response->assertSuccessful();
        $response->assertJsonStructure($this->expected_user_list_json);
    }

    private function __processPostUserTest()
    {
        $response = $this->post('/api/user', [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,            
        ]);

        $response->assertSuccessful();
        $response->assertJsonStructure($this->expected_user_json);

        return $response->original;
    }

    private function __processGetUserIdTest(int $user_id)
    {
        $response = $this->get('/api/user/'.$user_id);

        $response->assertSuccessful();
        $response->assertJsonStructure($this->expected_user_json);
    }

    private function __processPutUserTest(int $user_id)
    {
        $response = $this->get('/api/user/'.$user_id, [
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
        ]);

        $response->assertSuccessful();
        $response->assertJsonStructure($this->expected_user_json);
    }

    private function __processDeleteUserTest(int $user_id)
    {
        $response = $this->delete('/api/user/'.$user_id);

        $response->assertSuccessful();
    }

    private function __processAssignCarTest(int $user_id, int $car_id)
    {
        $response = $this->post('/api/user/assignCar', [
            'user_id' => $user_id,
            'car_id' => $car_id,
        ]);

        $response->assertSuccessful();
    }

    private function __processUnassignCarTest(int $user_id, int $car_id)
    {
        $response = $this->post('/api/user/unassignCar', [
            'user_id' => $user_id,
            'car_id' => $car_id,
        ]);

        $response->assertSuccessful();
    }

    private function __processUserCarsTest(int $user_id)
    {
        $response = $this->get("/api/user/$user_id/cars");

        $response->assertSuccessful();
    }
}
