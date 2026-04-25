<?php

namespace App\DTOs\Auth;

class LoginResult
{
    public function __construct(
        public readonly bool $success
    ) {
    }

    public static function success(): self
    {
        return new self(true);
    }

    public static function failure(): self
    {
        return new self(false);
    }
}
