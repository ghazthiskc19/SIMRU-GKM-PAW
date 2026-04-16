<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use App\Services\Auth\SessionUserService;

class AuthController extends Controller
{
    public function __construct(
        private readonly LoginService $loginService,
        private readonly SessionUserService $sessionUserService
    ) {
    }

    public function login_mahasiswa(LoginRequest $request)
    {
        $result = $this->loginService->attempt(
            $request->string('email')->toString(),
            $request->string('password')->toString()
        );

        if (!$result->success) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Email atau password tidak valid.');
        }

        return redirect()->route('home');
    }

    public function home()
    {
        $user = $this->sessionUserService->currentUser();
        return view('home', compact('user'));
    }

    public function menu()
    {
        $user = $this->sessionUserService->currentUser();
        return view('menu', compact('user'));
    }

    public function profile_mahasiswa()
    {
        $user = $this->sessionUserService->currentUser();
        return view('profile_mahasiswa', compact('user'));
    }
}
