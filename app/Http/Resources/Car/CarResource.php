<?php

namespace App\Http\Resources\Car;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'brand_id' => $this->brand->id,
            'brand_name' => $this->brand->name,
            'version_id' => $this->version->id,
            'version_name' => $this->version->name,
            'plate' => $this->plate,
            'color' => $this->color,
            'body_type' => $this->body_type,
            'fuel_type' => $this->fuel_type,
            'transmission_type' => $this->transmission_type,
            'year' => $this->year,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
