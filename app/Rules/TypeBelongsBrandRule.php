<?php

namespace App\Rules;

use App\Models\Brand;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class TypeBelongsBrandRule implements DataAwareRule, ValidationRule
{
    private int $brand_id;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $brand = Brand::whereHas('versions', function($query) use($value) {
            $query->where('id', $value);
        })->find($this->brand_id);

        if (!$brand) {
            $fail('The :attribute dont belongs to brand.');
        }
    }

    /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->brand_id = $data['brand_id'];
        return $this;
    }
}
