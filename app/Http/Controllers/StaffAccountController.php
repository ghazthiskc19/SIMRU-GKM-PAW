<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bem;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class StaffAccountController extends Controller
{
    public function createBem()
    {
        $bem = null;

        return view('staff.create_update_bem', compact('bem'));
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

        return redirect()->route('staff.bem.index')->with('success', 'Akun BEM berhasil ditambahkan.');
    }

    public function manageBem()
    {
        $DataBem = bem::orderBy('name')->get();

        return view('staff.manage_bem', compact('DataBem'));
    }

    public function editBem($id)
    {
        $bem = bem::findOrFail($id);

        return view('staff.create_update_bem', compact('bem'));
    }

    public function updateBem(Request $request, $id)
    {
        $bem = bem::findOrFail($id);

        $request->validate([
            'nim' => ['required', 'string', 'max:255', Rule::unique('bem', 'nim')->ignore($bem->id_bem, 'id_bem')],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('bem', 'email')->ignore($bem->id_bem, 'id_bem')],
            'password' => ['nullable', 'string', 'min:3'],
            'prodi' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'in:Ketua BEM,Wakil BEM,Anggota BEM'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = [
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'role' => 'bem',
            'jabatan' => $request->jabatan,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_bem', 'public');
        }

        $bem->update($data);

        return redirect()->route('staff.bem.index')->with('success', 'Akun BEM berhasil diperbarui.');
    }

    public function destroyBem($id)
    {
        $bem = bem::findOrFail($id);
        $bem->delete();

        return redirect()->route('staff.bem.index')->with('success', 'Akun BEM berhasil dihapus.');
    }
}
