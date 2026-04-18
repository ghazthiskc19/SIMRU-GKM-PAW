<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentHistoryController extends Controller
{
    public function index()
    {
        return view('riwayat_peminjaman', [
            'items' => $this->historyItems(),
        ]);
    }

    public function detail(int $id)
    {
        $item = collect($this->historyItems())->firstWhere('id_peminjaman', $id);

        if (!$item) {
            abort(404);
        }

        return view('riwayat_peminjaman_detail', [
            'item' => $item,
        ]);
    }

    public function laporanIndex()
    {
        return view('riwayat_laporan', [
            'items' => $this->laporanItems(),
        ]);
    }

    public function laporanDetail(int $id)
    {
        $item = collect($this->laporanItems())->firstWhere('id', $id);

        if (!$item) {
            abort(404);
        }

        return view('riwayat_laporan_detail', [
            'item' => $item,
        ]);
    }

    public function laporanForm()
    {
        return view('laporan_masalah');
    }

    public function storeLaporan(Request $request)
    {
        try {
            $validated = $request->validate([
                'ruangan' => 'required|string',
                'nama' => 'required|string',
                'nim' => 'required|string',
                'prodi' => 'required|string',
                'tanggal' => 'required|date',
                'waktu' => 'required',
                'permasalahan' => 'required|string',
                'dokumen' => 'nullable|array',
                'dokumen.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        }

        $path = $this->getLaporanJsonPath();
        $items = $this->loadLaporanItems();

        $nextId = collect($items)->pluck('id')->max();
        $nextId = $nextId ? $nextId + 1 : 1;

        $roomLabel = match ($validated['ruangan']) {
            'gkm4.1' => 'GKM 4.1',
            'gkm4.2' => 'GKM 4.2',
            'gkm3.1' => 'GKM 3.1',
            default => strtoupper($validated['ruangan']),
        };

        $tanggal = date('d F Y', strtotime($validated['tanggal']));
        $dayName = $this->indonesianDayName($validated['tanggal']);
        $formattedDate = "$dayName, $tanggal";
        $timeLabel = date('H:i', strtotime($validated['waktu'])) . ' WIB';

        $newItem = [
            'id' => $nextId,
            'ruangan' => $roomLabel,
            'hari_tanggal' => $formattedDate,
            'pukul' => $timeLabel,
            'status' => 'Sedang Ditinjau',
            'status_class' => 'badge-warning',
            'footer' => 'Laporan telah dikirim dan sedang ditinjau oleh staf.',
            'status_title' => 'Laporan Sedang Ditinjau',
            'status_time' => date('d M Y | H.i WIB'),
            'tanggal' => $tanggal,
            'waktu' => $timeLabel,
            'tempat' => $roomLabel,
            'kegiatan' => 'Laporan Masalah',
            'lembaga' => $validated['prodi'],
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'description' => [
                'Nama: ' . $validated['nama'],
                'NIM: ' . $validated['nim'],
                'Program Studi: ' . $validated['prodi'],
                'Detail Laporan: ' . $validated['permasalahan'],
            ],
        ];

        if ($request->hasFile('dokumen')) {
            $uploaded = [];
            foreach ($request->file('dokumen') as $file) {
                $uploaded[] = $file->store('laporan_files', 'local');
            }
            if (!empty($uploaded)) {
                $newItem['dokumen'] = array_map(fn($path) => basename($path), $uploaded);
            }
        }

        $items[] = $newItem;
        $result = file_put_contents($path, json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        if ($result === false) {
            return back()->withErrors(['error' => 'Gagal menyimpan laporan.']);
        }

        return redirect()->route('riwayat-laporan')->with('success', 'Laporan masalah berhasil disimpan.');
    }

    private function getLaporanJsonPath(): string
    {
        $storagePath = storage_path('app');
        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        return $storagePath . '/data_laporan.json';
    }

    private function loadLaporanItems(): array
    {
        $path = $this->getLaporanJsonPath();

        if (!file_exists($path)) {
            return [];
        }

        $json = file_get_contents($path);
        $data = json_decode($json, true);

        return is_array($data) ? $data : [];
    }

    private function indonesianDayName(string $date): string
    {
        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];

        return $days[date('l', strtotime($date))] ?? date('l', strtotime($date));
    }

    public function verifikasiPeminjaman()
    {
        return view('bem.verifikasi_peminjaman', [
            'items' => $this->historyItems(),
        ]);
    }

    public function verifikasiPeminjamanDetail(int $id)
    {
        $item = collect($this->historyItems())->firstWhere('id', (int) $id);

        if (!$item) {
            abort(404);
        }

        return view('bem.verifikasi_peminjaman_detail', [
            'detail' => $item,
        ]);
    }

    private function historyItems(): array
    {
        $path = storage_path('app/data_peminjaman.json');

        if (!file_exists($path)) {
            return [];
        }

        $json = file_get_contents($path);
        $data = json_decode($json, true);

        if (!is_array($data)) {
            return [];
        }

        return array_map(function($item) {
            $ruanganMap = [
                '1' => 'GKM 4.1',
                '2' => 'GKM 4.2',
                '3' => 'GKM 3.1',
            ];

            $ruangan = $ruanganMap[$item['ruangan_id']] ?? 'GKM ' . $item['ruangan_id'];

            $tanggal = date('d F Y', strtotime($item['tanggal_pemakaian']));
            $dayName = $this->indonesianDayName($item['tanggal_pemakaian']);
            $formattedDate = "$dayName, $tanggal";
            $timeLabel = date('H:i', strtotime($item['jam_mulai'])) . ' - ' . date('H:i', strtotime($item['jam_selesai'])) . ' WIB';

            return [
                'id_peminjaman' => $item['id_peminjaman'],
                'ruangan' => $ruangan,
                'hari_tanggal' => $formattedDate,
                'pukul' => $timeLabel,
                'status' => 'Selesai Dipinjam',
                'status_class' => 'badge-success',
                'footer' => 'Peminjaman telah selesai dilaksanakan.',
                'status_title' => 'Peminjaman Selesai',
                'status_time' => date('d M Y | H.i WIB', strtotime($item['tanggal_pemakaian'])),
                'tanggal' => $tanggal,
                'waktu' => $timeLabel,
                'tempat' => $ruangan,
                'kegiatan' => $item['alasan_peminjaman'] ?? 'Kegiatan Organisasi',
                'lembaga' => $item['prodi'],
                'nama' => $item['nama'],
                'nim' => $item['nim'],
                'description' => [
                    'Nama: ' . $item['nama'],
                    'NIM: ' . $item['nim'],
                    'Program Studi: ' . $item['prodi'],
                    'Alasan Peminjaman: ' . ($item['alasan_peminjaman'] ?? ''),
                    'Sarana Prasarana: ' . ($item['sarana_prasarana'] ?? ''),
                    'Alat Tambahan: ' . ($item['alat_tambahan'] ?? ''),
                ],
            ];
        }, $data);
    }

    private function laporanItems(): array
    {
        return $this->loadLaporanItems();
    }
}

