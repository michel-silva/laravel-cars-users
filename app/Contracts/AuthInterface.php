<?php

namespace App\Contracts;

use Laravel\Sanctum\NewAccessToken;

interface AuthInterface {
    public function login(string $user, string $password) : NewAccessToken;
    public function logout();

}