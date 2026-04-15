<?php

namespace App\DTOs\Auth;

class LoginResult
{
    public function __construct(
        public readonly bool $success,
        public readonly ?array $user = null
    ) {
    }

    public static function success(array $user): self
    {
        return new self(true, $user);
    }

    public static function failure(): self
    {
        return new self(false, null);
    }
}
