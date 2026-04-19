<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        $lastId = 0;
        $path = storage_path('app/data_peminjaman.json');

        if (file_exists($path)) {
            $json = file_get_contents($path);
            $data_lama = json_decode($json, true);

            if (!is_array($data_lama)) {
                $data_lama = [];
            }

             foreach ($data_lama as $item) {
                if (isset($item['id_peminjaman']) && is_numeric($item['id_peminjaman'])) {
                    $lastId = max($lastId, (int)$item['id_peminjaman']);
                }
            }
        } else {
            $data_lama = [];
        }

        $idUnik = $lastId + 1;

        
        $data = [
            "id_peminjaman" => $idUnik,
            "ruangan_id" => $request->ruangan_id,
            "nama" => $request->nama,
            "nim" => $request->nim,
            "prodi" => $request->program_studi,
            "tanggal_pemakaian" => $request->tanggal_pemakaian,
            "jam_mulai" => $request->jam_mulai,
            "jam_selesai" => $request->jam_selesai,
            "alasan_peminjaman" => $request->alasan_peminjaman,
            "sarana_prasarana" => $request->sarana_prasarana,
            "alat_tambahan" => $request->alat_tambahan,
            "dokumen" => $dokumenPaths,
            "status"=> 'Proses Pengajuan'
        ];
        
       

        $data_lama[] = $data;
       
        file_put_contents(
            $path,
            json_encode($data_lama, JSON_PRETTY_PRINT),
            LOCK_EX
        );
        return redirect()->route('notifikasi')
                ->with('success', 'Data berhasil disimpan');
        
    }
}
