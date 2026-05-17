<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function detail(Request $request)
    {
        $id = (int) $request->input('ruangan', 1);

        $json = file_get_contents(storage_path('app/data_ruangan.json'));
        $data = json_decode($json, true);

        $ruangan = collect($data)->first(function ($item) use ($id) {
            return (int) $item['id_ruangan'] === $id;
        });
        if (!$ruangan) {
            abort(404, 'Ruangan tidak ditemukan');
        }

        return view('list_ruangan_detail', compact('ruangan'));
    }

    public function peminjaman(Request $request)
    {
        $id = (int) $request->input('ruangan', 1);

        $json = file_get_contents(storage_path('app/data_ruangan.json'));
        $data = json_decode($json, true);

        $ruangan = collect($data)->first(function ($item) use ($id) {
            return (int) $item['id_ruangan'] === $id;
        });

        if (!$ruangan) {
            abort(404, 'Ruangan tidak ditemukan');
        }

        return view('peminjaman_ruangan', compact('ruangan', 'data'));
    }

    public function getJadwal()
    {
        $data = Peminjaman::where('status_peminjaman', 'Disetujui')
            ->get()
            ->map(function ($item) {
                return [
                    'title' => $item->nama_kegiatan,
                    'start' => $item->waktu_mulai,
                    'end' => $item->waktu_selesai,
                    'extendedProps' => [
                        'roomId' => $item->id_ruangan,
                    ],
                ];
        });

        return response()->json($data);
    }
    
}
