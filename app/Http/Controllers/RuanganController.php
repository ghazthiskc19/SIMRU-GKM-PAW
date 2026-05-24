<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RuanganController extends Controller
{
    private function findRuanganOrFail($param)
    {
        if ($param instanceof Request) {
            $id = (int) $param->input('ruangan', 1);
        } else {
            $id = (int) $param;
        }

        return ruangan::findOrFail($id);
    }

    public function detailRuangan(Request $request)
    {
        $ruangan = $this->findRuanganOrFail($request);
        return view('list_ruangan_detail', compact('ruangan'));
    }

    public function detailRuanganStaff(Request $request)
    {
        $ruangan = $this->findRuanganOrFail($request);
        return view('ruangan_detail', compact('ruangan'));
    }

    public function detailManageRuangan(Request $req){
        $id = (int) $req->input('ruangan', 1);

        $ruangan = ruangan::findOrFail($id);

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

    public function getJadwal(Request $request)
    {
        $rooms = $request->rooms; // array id ruangan

        $query = Peminjaman::where('status_peminjaman', 'Sudah Tervalidasi/Disetujui');

        // kalau ada filter ruangan
        if (!empty($rooms)) {
            $query->whereIn('id_ruangan', $rooms);
        }

        $data = $query->get()->map(function ($item) {
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

    private function getAllData(){
        return ruangan::all();
    }
    public function dataListRuangan(){
        $DataRuangan = $this->getAllData();
        return view('list_ruangan', compact('DataRuangan'));
    }

    public function redirectStaff($id){
        $ruangan = $this->findRuanganOrFail($id);
        return view('staff.ruangan_add_edit', compact('ruangan'));
    }

    public function createStaffRuangan()
    {
        $ruangan = null;

        return view('staff.ruangan_add_edit', compact('ruangan'));
    }

    public function storeStaffRuangan(Request $request)
    {
        $validated = $request->validate([
            'nama_ruangan' => ['required', 'string', 'max:255'],
            'status_ruangan' => ['required', 'string', 'max:255'],
            'kapasitas' => ['required', 'string', 'max:255'],
            'lokasi' => ['required', 'string'],
            'fasilitas' => ['required', 'string'],
            'path_images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $paths = [];
        if ($request->hasFile('path_images')) {
            foreach ($request->file('path_images') as $image) {
                $paths[] = $image->store('ruangan', 'public');
            }
        }

        ruangan::create([
            'nama_ruangan' => $validated['nama_ruangan'],
            'status_ruangan' => $validated['status_ruangan'],
            'kapasitas' => $validated['kapasitas'],
            'lokasi' => $validated['lokasi'],
            'fasilitas' => $validated['fasilitas'],
            'path_images' => $paths ? json_encode($paths) : null,
        ]);

        return redirect()->route('staff.ruangan.index');
    }

    public function updateStaffRuangan(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_ruangan' => ['required', 'string', 'max:255'],
            'status_ruangan' => ['required', 'string', 'max:255'],
            'kapasitas' => ['required', 'string', 'max:255'],
            'lokasi' => ['required', 'string'],
            'fasilitas' => ['required', 'string'],
            'path_images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $ruangan = ruangan::findOrFail($id);
        $paths = $ruangan->path_images ? json_decode($ruangan->path_images, true) : [];

        if ($request->hasFile('path_images')) {
            foreach ($request->file('path_images') as $image) {
                $paths[] = $image->store('ruangan', 'public');
            }
        }

        $ruangan->update([
            'nama_ruangan' => $validated['nama_ruangan'],
            'status_ruangan' => $validated['status_ruangan'],
            'kapasitas' => $validated['kapasitas'],
            'lokasi' => $validated['lokasi'],
            'fasilitas' => $validated['fasilitas'],
            'path_images' => $paths ? json_encode($paths) : null,
        ]);

        return redirect()->route('staff.ruangan.index');
    }


    public function deleteRuanganStaff($id){
        $ruangan = $this->findRuanganOrFail($id);
        $ruangan->delete();

        return redirect()->route('staff.ruangan.index')->with('success', 'Ruangan berhasil dihapus!');
    }

    
}
