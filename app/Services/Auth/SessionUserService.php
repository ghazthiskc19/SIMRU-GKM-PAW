<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Session;

class SessionUserService
{
    public function setCurrentUser(array $user): void
    {
        Session::put('user', $user);
    }

    public function currentUser(): ?array
    {
        $user = Session::get('user');
        return is_array($user) ? $user : null;
    }

    public function clearCurrentUser(): void
    {
        Session::forget('user');
    }
}
