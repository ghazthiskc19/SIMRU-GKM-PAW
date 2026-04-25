<?php

namespace App\Services\Auth;

use App\DTOs\Auth\LoginResult;
use App\Repositories\Contracts\LoginLogRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function __construct(
        private readonly LoginLogRepositoryInterface $loginLogRepository
    ) {
    }

    public function attempt(string $email, string $password): LoginResult
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return LoginResult::failure();
        }

        $user = Auth::user();
        if (!$user) {
            return LoginResult::failure();
        }

        $this->loginLogRepository->append([
            'email' => $email,
            'role' => $user->role ?? 'unknown',
            'login_time' => now()->toDateTimeString(),
        ]);

        return LoginResult::success();
    }
}
