<?php

namespace App\Repositories\Contracts;

interface LoginLogRepositoryInterface
{
    public function append(array $logEntry): void;
}
