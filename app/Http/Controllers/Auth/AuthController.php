<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private AuthService $auth_service;

    public function __construct(AuthService $auth_service) {
        $this->auth_service = $auth_service;
    }
    public function register(RegisterRequest $request)
    {
        return $this->auth_service->register($request->name, $request->email, $request->password);
    }

    public function login(AuthRequest $request)
    {
        return $this->auth_service->login($request->email, $request->password);
    }

    public function logout()
    {
        return $this->auth_service->logout();
    }
}
