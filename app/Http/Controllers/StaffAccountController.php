<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bem;
use Illuminate\Support\Facades\Hash;

class StaffAccountController extends Controller
{
    public function createBem()
    {
        return view('staff.create_bem');
    }

    public function storeBem(Request $request)
    {
        $request->validate([
            'nim' => ['required', 'string', 'max:255', 'unique:bem,nim'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:bem,email'],
            'password' => ['nullable', 'string', 'min:3'],
            'prodi' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'in:Ketua BEM,Wakil BEM,Anggota BEM'],
        ]);

        $password = $request->password ?: '123';

        $data = [
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'prodi' => $request->prodi,
            'role' => 'bem',
            'jabatan' => $request->jabatan,
            'foto' => null,
        ];

        bem::create($data);

        return redirect()->route('menu')->with('success', 'Akun BEM berhasil ditambahkan.');
    }
}
