<?php

namespace App\Http\Controllers;

use App\Classes\QueryParam;
use App\Http\Requests\Car\CarRequest;
use App\Http\Resources\Car\CarResource;
use App\Http\Resources\Car\CarsResource;
use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private CarService $car_service;

    public function __construct(CarService $car_service) {
        $this->car_service = $car_service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return CarsResource::collection($this->car_service->getPaginate(new QueryParam($request->per_page, $request->page)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        return CarResource::make($this->car_service->create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CarResource::make($this->car_service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        return CarResource::make($this->car_service->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return CarResource::make($this->car_service->delete($id));
    }
}
