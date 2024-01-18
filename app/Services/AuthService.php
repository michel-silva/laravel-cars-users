<?php

namespace App\Services;

use App\Contracts\AuthInterface;
use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

class AuthService {
    
    private AuthInterface $auth_interface;

    public function __construct(AuthInterface $auth_interface) {
        $this->auth_interface = $auth_interface;
    }

    public function register(string $name, string $email, string $password) : User
    {
        return $this->auth_interface->register($name, $email, $password);
    }   
     
    public function login(string $user, string $password) : NewAccessToken
    {
        return $this->auth_interface->login($user, $password);
    }

    public function logout()
    {
        return $this->auth_interface->logout();
    }
}