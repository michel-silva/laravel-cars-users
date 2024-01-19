<?php

namespace App\Http\Requests\Car;

use App\Enums\Car\BodyType;
use App\Enums\Car\FuelType;
use App\Enums\Car\TransmissionType;
use App\Rules\TypeBelongsBrandRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => ['required', 'exists:brands,id'],
            'version_id' => ['required', 'exists:versions,id', new TypeBelongsBrandRule],
            'plate' => ['required', 'string', 'unique:cars,plate,'.$this->route()->parameter('car')],
            'color' => ['required', 'string'],
            'body_type' => ['required', 'in:'.implode(',', Arr::map(BodyType::cases(), fn($type) => $type->value))],
            'fuel_type' => ['required', 'in:'.implode(',', Arr::map(FuelType::cases(), fn($type) => $type->value))],
            'transmission_type' => ['required', 'in:'.implode(',', Arr::map(TransmissionType::cases(), fn($type) => $type->value))],
            'year' => ['required', 'date_format:Y'],
        ];
    }
}
