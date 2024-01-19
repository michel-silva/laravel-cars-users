<?php

namespace App\Observers;

use App\Models\Car;

class CarObserver
{
    /**
     * Handle the Car "deleting" event.
     */
    public function deleting(Car $car): void
    {
        $car->users()->detach();
    }
}
