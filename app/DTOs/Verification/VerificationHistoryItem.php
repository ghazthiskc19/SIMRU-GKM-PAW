<?php

namespace App\DTOs\Verification;

class VerificationHistoryItem
{
    public function __construct(private readonly array $payload)
    {
    }

    public static function fromArray(array $payload): self
    {
        return new self($payload);
    }

    public function toArray(): array
    {
        return $this->payload;
    }
}
