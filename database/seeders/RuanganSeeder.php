<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_ruangan' => 1,
                'nama_ruangan' => 'GKM 4.1',
                'status' => 'Tersedia',
                'fasilitas' => 'AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone',
                'kapasitas' => '80 Orang',
                'lokasi' => 'Gedung GKM lantai 4 Fakultas Ilmu Komputer',
                'images' => ['/images/hero_ruangan.png', '/images/hero_ruangan.png', '/images/hero_ruangan.png'],
            ],
            [
                'id_ruangan' => 2,
                'nama_ruangan' => 'GKM 4.2',
                'status' => 'Tersedia',
                'fasilitas' => 'AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone',
                'kapasitas' => '80 Orang',
                'lokasi' => 'Gedung GKM lantai 4 Fakultas Ilmu Komputer',
                'images' => ['/images/hero_ruangan.png', '/images/hero_ruangan.png', '/images/hero_ruangan.png'],
            ],
            [
                'id_ruangan' => 3,
                'nama_ruangan' => 'GKM 4.3',
                'status' => 'Tersedia',
                'fasilitas' => 'AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone',
                'kapasitas' => '80 Orang',
                'lokasi' => 'Gedung GKM lantai 4 Fakultas Ilmu Komputer',
                'images' => ['/images/hero_ruangan.png', '/images/hero_ruangan.png', '/images/hero_ruangan.png'],
            ],
            [
                'id_ruangan' => 4,
                'nama_ruangan' => 'GKM Lantai 1',
                'status' => 'Tersedia',
                'fasilitas' => 'AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone',
                'kapasitas' => '200 Orang',
                'lokasi' => 'Gedung GKM lantai 1 Fakultas Ilmu Komputer',
                'images' => ['/images/hero_ruangan.png', '/images/hero_ruangan.png', '/images/hero_ruangan.png'],
            ],
        ];

        $now = Carbon::now();
        $rows = array_map(function ($item) use ($now) {
            return [
                'id_ruangan' => $item['id_ruangan'] ?? null,
                'nama_ruangan' => $item['nama_ruangan'] ?? null,
                'status_ruangan' => $item['status'] ?? ($item['status_ruangan'] ?? null),
                'fasilitas' => $item['fasilitas'] ?? null,
                'kapasitas' => $item['kapasitas'] ?? null,
                'lokasi' => $item['lokasi'] ?? null,
                'path_images' => isset($item['images']) ? json_encode($item['images']) : (isset($item['path_images']) ? json_encode($item['path_images']) : null),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $items);

        DB::table('ruangan')->insertOrIgnore($rows);
    }
}
