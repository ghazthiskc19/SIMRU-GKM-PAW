<?php

namespace App\Services\Bem;

use App\DTOs\Verification\VerificationHistoryItem;
use App\Repositories\Contracts\VerificationHistoryRepositoryInterface;

class VerificationHistoryService
{
    public function __construct(private readonly VerificationHistoryRepositoryInterface $repository)
    {
    }

    public function getList(string $month = 'Oktober 2025'): array
    {
        $items = array_map(
            static fn (array $item) => VerificationHistoryItem::fromArray($item)->toArray(),
            $this->repository->all()
        );

        return [
            'selectedMonth' => $month,
            'items' => $items,
        ];
    }

    public function getDetailById(int $id): ?array
    {
        $item = $this->repository->findById($id);
        return $item ? VerificationHistoryItem::fromArray($item)->toArray() : null;
    }
}
