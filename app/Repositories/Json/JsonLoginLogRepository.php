<?php

namespace App\Repositories\Json;

use App\Repositories\Contracts\LoginLogRepositoryInterface;
use App\Support\JsonStorage;

class JsonLoginLogRepository implements LoginLogRepositoryInterface
{
    public function __construct(private readonly JsonStorage $jsonStorage)
    {
    }

    public function append(array $logEntry): void
    {
        $path = storage_path('app/login_log.json');
        $logs = $this->jsonStorage->readArray($path);
        $logs[] = $logEntry;
        $this->jsonStorage->writeArray($path, $logs);
    }
}
