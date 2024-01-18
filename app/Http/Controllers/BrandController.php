<?php

namespace App\Http\Controllers;

use App\Classes\QueryParam;
use App\Http\Resources\Brand\BrandsResource;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private BrandService $brand_service;

    public function __construct(BrandService $brand_service) {
        $this->brand_service = $brand_service;
    }

     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return BrandsResource::collection($this->brand_service->getPaginate(new QueryParam($request->per_page, $request->page)));
    }
}
