<?php

use App\Enums\Car\BodyType;
use App\Enums\Car\FuelType;
use App\Enums\Car\TransmissionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('version_id')->constrained()->cascadeOnDelete();
            $table->string('plate')->unique();
            $table->string('color');
            $table->enum('body_type', Arr::map(BodyType::cases(), fn($type) => $type->value));
            $table->enum('fuel_type', Arr::map(FuelType::cases(), fn($type) => $type->value));
            $table->enum('transmission_type', Arr::map(TransmissionType::cases(), fn($type) => $type->value));
            $table->year('year');
            $table->double('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
