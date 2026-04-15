<?php

namespace App\Repositories\Json;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Support\JsonStorage;

class JsonUserRepository implements UserRepositoryInterface
{
    public function __construct(private readonly JsonStorage $jsonStorage)
    {
    }

    public function findByEmail(string $email): ?array
    {
        $users = $this->jsonStorage->readArray(storage_path('app/users.json'));

        foreach ($users as $user) {
            if (($user['email'] ?? null) === $email) {
                return $user;
            }
        }

        return null;
    }
}
