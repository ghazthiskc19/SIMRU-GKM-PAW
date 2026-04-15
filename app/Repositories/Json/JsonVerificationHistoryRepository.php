<?php

namespace App\Repositories\Json;

use App\Repositories\Contracts\VerificationHistoryRepositoryInterface;
use App\Support\JsonStorage;

class JsonVerificationHistoryRepository implements VerificationHistoryRepositoryInterface
{
    public function __construct(private readonly JsonStorage $jsonStorage)
    {
    }

    public function all(): array
    {
        return $this->jsonStorage->readArray(storage_path('app/verifications.json'));
    }

    public function findById(int $id): ?array
    {
        foreach ($this->all() as $item) {
            if ((int) ($item['id'] ?? 0) === $id) {
                return $item;
            }
        }

        return null;
    }
}
