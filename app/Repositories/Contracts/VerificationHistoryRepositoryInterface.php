<?php

namespace App\Repositories\Contracts;

interface VerificationHistoryRepositoryInterface
{
    public function all(): array;

    public function findById(int $id): ?array;
}
