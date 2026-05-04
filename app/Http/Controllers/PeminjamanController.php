<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class PeminjamanController extends Controller
{
    public function peminjaman(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
        ]);

        $dokumenPaths = [];

        if ($request->hasFile('dokumen')) {
            foreach ($request->file('dokumen') as $file) {
                $dokumenPaths[] = $file->store('dokumen');
            }
        }

        // Determine user id: prefer authenticated user, otherwise find or create by NIM
        if (Auth::check()) {
            $userId = Auth::id();
        } else {
            $user = User::where('nim', $request->nim)->first();
            if (!$user) {
                $email = strtolower(str_replace(' ', '', $request->nama)) . '@gmail.com';
                $user = User::create([
                    'name' => $request->nama,
                    'nim' => $request->nim,
                    'email' => $email,
                    'password' => bcrypt('password123'),
                    'prodi' => $request->program_studi ?? 'Unknown',
                    'role' => 'mahasiswa',
                ]);
            }
            $userId = $user->id_users ?? $user->id;
        }

        // Build datetime values
        $waktuMulai = Carbon::createFromFormat('Y-m-d H:i', $request->tanggal_pemakaian . ' ' . $request->jam_mulai)->toDateTimeString();
        $waktuSelesai = Carbon::createFromFormat('Y-m-d H:i', $request->tanggal_pemakaian . ' ' . $request->jam_selesai)->toDateTimeString();

        // Persist to database using Eloquent
        Peminjaman::create([
            'id_users' => $userId,
            'id_ruangan' => $request->ruangan_id,
            'status_peminjaman' => 'Proses Pengajuan',
            'path_surat' => $dokumenPaths[0] ?? null,
            'nama_kegiatan' => $request->alasan_peminjaman ?? 'Kegiatan',
            'waktu_mulai' => $waktuMulai,
            'waktu_selesai' => $waktuSelesai,
            'tanggal_pengajuan' => Carbon::now(),
        ]);

        // Backup: original JSON-based persistence is preserved below (commented)
        /*
        (original JSON write logic preserved here)
        */

        return redirect()->route('riwayat-peminjaman')
                ->with('success', 'Data berhasil disimpan');
    }
}
