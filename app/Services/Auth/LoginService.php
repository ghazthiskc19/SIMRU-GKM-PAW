<?php

namespace App\Services\Auth;

use App\DTOs\Auth\LoginResult;
use App\Repositories\Contracts\LoginLogRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

class LoginService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly LoginLogRepositoryInterface $loginLogRepository,
        private readonly SessionUserService $sessionUserService
    ) {
    }

    public function attempt(string $email, string $password): LoginResult
    {
        $user = $this->userRepository->findByEmail($email);
        if (!$user) {
            return LoginResult::failure();
        }

        if (($user['password'] ?? null) !== $password) {
            return LoginResult::failure();
        }

        $this->sessionUserService->setCurrentUser($user);

        $this->loginLogRepository->append([
            'email' => $email,
            'role' => $user['role'] ?? 'unknown',
            'login_time' => now()->toDateTimeString(),
        ]);

        return LoginResult::success($user);
    }
}
