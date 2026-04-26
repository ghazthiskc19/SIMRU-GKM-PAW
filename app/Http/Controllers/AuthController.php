<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function __construct(
        private readonly LoginService $loginService
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

        $request->session()->regenerate();

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
        $nim = $request->nim;
        $name = $request->nama;
        $email =  $request->email;
        if (User::where('nim', $nim)->exists()) {
            return back()->withInput()->withErrors([
                'nim' => 'NIM sudah terdaftar'
            ]);
        }

        if (User::where('email', $email)->exists()) {
            return back()->withInput()->withErrors([
                'email' => 'Email sudah terdaftar'
            ]);
        }

        if (User::where('name', $name)->exists()) {
            return back()->withInput()->withErrors([
                'nama' => 'Nama sudah digunakan'
            ]);
        }

        $path = null;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_users', 'public');
        }

        User::create([
            'name' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'prodi' => $request->prodi,
            'role' => $role,
            'foto' => $path
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function home()
    {
        return view('home');
    }

    public function menu()
    {
        return view('menu');
    }

    public function profile()
    {
        $user = Auth::user();
        
        return view('profile', compact('user'));
    }
}
