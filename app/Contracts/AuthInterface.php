<?php

namespace App\Contracts;

use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

interface AuthInterface {
    public function register(string $name, string $email, string $password) : User;
    public function login(string $user, string $password) : NewAccessToken;
    public function logout();

}