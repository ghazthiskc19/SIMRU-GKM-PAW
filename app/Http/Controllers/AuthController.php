<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Services\Auth\LoginService;
use App\Services\Auth\SessionUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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

    public function register_user(Request $request){
       $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:users,nim',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'prodi' => 'required|string',
            'role' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048' // max 2MB
        ]);
        
        $role = $request->role;
        if ($role == 'bem'){
            $exists = DB::table('bem')
                ->where('nim', $request->nim)
                ->exists();

            if (!$exists){
                return back()
                    ->withInput()
                    ->withErrors([
                         'nim' => 'Pendaftaran gagal, NIM anda tidak terdaftar sebagai anggota BEM'
                    ]);
            }
        }

        $path = null;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_users', 'public');
        }

        User::create([
            'name' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => $request->password, // auto hash
            'prodi' => $request->prodi,
            'role' => $role,
            'foto' => $path
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function logout()
    {
        session()->forget('user');   // hapus user dari session
        session()->flush();          // hapus semua session

        return redirect('/');
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

    public function profile()
    {
        $user = $this->sessionUserService->currentUser();
        return view('profile', compact('user'));
    }
}
