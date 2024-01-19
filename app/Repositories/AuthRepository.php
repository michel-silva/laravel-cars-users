<?php

namespace App\Repositories;

use App\Contracts\AuthInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\NewAccessToken;

class AuthRepository implements AuthInterface{

    public function register(string $name, string $email, string $password) : User
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return $user;
    }

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