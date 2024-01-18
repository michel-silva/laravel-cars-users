<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    static $brand_list = [
        'Chevrolet' => [
            ['name' => 'Cruze'],
            ['name' => 'Onix'],
            ['name' => 'Trax'],
            ['name' => 'Equinox'],
        ],
        'Volkswagen' => [
            ['name' => 'Golf'],
            ['name' => 'Jetta'],
            ['name' => 'Tiguan'],
            ['name' => 'Atlas'],
        ],
        'Ford' => [
            ['name' => 'Fiesta'],
            ['name' => 'Focus'],
            ['name' => 'Mustang'],
            ['name' => 'Explorer'],
        ],
        'Fiat' => [
            ['name' => '500'],
            ['name' => 'Punto'],
            ['name' => 'Toro'],
            ['name' => 'Doblo'],
        ],
        'Renault' => [
            ['name' => 'Clio'],
            ['name' => 'Megane'],
            ['name' => 'Captur'],
            ['name' => 'Koleos'],
        ],
        'Toyota' => [
            ['name' => 'Corolla'],
            ['name' => 'Camry'],
            ['name' => 'RAV4'],
            ['name' => 'Highlander'],
        ],
        'Honda' => [
            ['name' => 'Civic'],
            ['name' => 'Accord'],
            ['name' => 'CR-V'],
            ['name' => 'Pilot'],
        ],
        'Hyundai' => [
            ['name' => 'Elantra'],
            ['name' => 'Sonata'],
            ['name' => 'Santa Fe'],
            ['name' => 'Palisade'],
        ],
        'Nissan' => [
            ['name' => 'Altima'],
            ['name' => 'Maxima'],
            ['name' => 'Rogue'],
            ['name' => 'Pathfinder'],
        ],
        'Jeep' => [
            ['name' => 'Cherokee'],
            ['name' => 'Grand Cherokee'],
            ['name' => 'Wrangler'],
            ['name' => 'Gladiator'],
        ],
        'Peugeot' => [
            ['name' => '208'],
            ['name' => '308'],
            ['name' => '3008'],
            ['name' => '5008'],
        ],
        'Citroën' => [
            ['name' => 'C3'],
            ['name' => 'C4'],
            ['name' => 'C5'],
            ['name' => 'C4 Cactus'],
        ],
        'Mitsubishi' => [
            ['name' => 'Outlander'],
            ['name' => 'Pajero'],
            ['name' => 'L200'],
            ['name' => 'Eclipse Cross'],
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(self::$brand_list as $brand => $versions) {
            $brand = Brand::firstOrCreate(['name' => $brand]);
            foreach($versions as $version) {
                $brand->versions()->firstOrCreate($version, []);
            }
        }
    }
}
