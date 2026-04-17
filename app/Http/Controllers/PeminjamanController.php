<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data = [
            "nama" => $request->nama,
            "nim" => $request->nim,
            "prodi" => $request->program_studi,
            "tanggal_pemakaian" => $request->tanggal_pemakaian,
            "ruangan_id" => $request->ruangan_id,
            "jam_mulai" => $request->jam_mulai,
            "jam_selesai" => $request->jam_selesai,
            "alasan_peminjaman" => $request->alasan_peminjaman,
            "sarana_prasarana" => $request->sarana_prasarana,
            "alat_tambahan" => $request->alat_tambahan,
            "dokumen" => $dokumenPaths
        ];

        $path = "data_peminjaman.json";

        if (Storage::exists($path)){
            $json = Storage::get($path);
            $data_lama = json_decode($json, true);
        }else{
            $data_lama = [];
        }

        $data_lama[] = $data;
       
        file_put_contents(
            storage_path('app/data_peminjaman.json'),
            json_encode($data_lama, JSON_PRETTY_PRINT)
        );
        return redirect()->route('notifikasi')
                ->with('success', 'Data berhasil disimpan');
        
    }
}
