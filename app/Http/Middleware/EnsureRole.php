<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    public function handle(Request $request, Closure $next, string ...$allowedRoles): Response
    {
        $user = session('user');
        $role = $user['role'] ?? null;

        if (!$role || !in_array($role, $allowedRoles, true)) {
            if ($role === 'bem') {
                return redirect()->route('riwayat-verifikasi');
            }

            if ($role === 'mahasiswa') {
                return redirect()->route('riwayat-peminjaman');
            }

            return redirect()->route('home');
        }

        return $next($request);
    }
}
