<?php

namespace Database\Factories;

use App\Enums\Car\BodyType;
use App\Enums\Car\FuelType;
use App\Enums\Car\TransmissionType;
use App\Models\Brand;
use App\Models\Version;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    use WithFaker;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brand = Brand::first();

        return [
            'brand_id' => $brand->id,
            'version_id' => $brand->versions[0]->id,
            'plate' => 'aaa-0000',
            'color' => $this->faker->colorName,
            'body_type' => BodyType::getRandonValue(),
            'fuel_type' => FuelType::getRandonValue(),
            'transmission_type' => TransmissionType::getRandonValue(),
            'year' => $this->faker->year
        ];
    }
}
