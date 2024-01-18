<?php

namespace App\Services;

use App\Classes\QueryParam;
use App\Contracts\AuthInterface;
use App\Models\Car;
use App\Repositories\CarRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Laravel\Sanctum\NewAccessToken;

class AuthService {
    
    private AuthInterface $auth_interface;

    public function __construct(AuthInterface $auth_interface) {
        $this->auth_interface = $auth_interface;
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