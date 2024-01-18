<?php

namespace App\Repositories;

use App\Contracts\AuthInterface;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\NewAccessToken;

class AuthRepository implements AuthInterface{
    public function login(string $user, string $password) : NewAccessToken
    {
        if (!Auth::attempt(['email' => $user, 'password' => $password])) {
            throw ValidationException::withMessages(['error' => 'Your email or password is incorrect.']);
        }
        
        return Auth::user()->createToken($user);
    }

    public function logout()
    {
        return Auth::user()->currentAccessToken()->delete();
    }
}