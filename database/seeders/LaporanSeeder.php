<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanSeeder extends Seeder
{
    public function run()
    {
        $dataLaporan = [
            [
                "ruangan" => "GKM 4.1", "status" => "Sedang Ditinjau", "nama" => "Prabroro", "nim" => "12345", "lembaga" => "Teknik Persawitan",
                "description" => ["Nama: Prabroro", "NIM: 12345", "Program Studi: Teknik Persawitan", "Detail Laporan: Ada setan sawit yang menunggu ruangan ini"]
            ],
            [
                "ruangan" => "GKM 4.1", "status" => "Sedang Ditinjau", "nama" => "adwa", "nim" => "123", "lembaga" => "dadw",
                "description" => ["Nama: adwa", "NIM: 123", "Program Studi: dadw", "Detail Laporan: adwadw"]
            ]
        ];

        foreach ($dataLaporan as $item) {
            // 1. Cari atau buat User
            $user = DB::table('users')->where('nim', $item['nim'])->first();
            if (!$user) {
                $userId = DB::table('users')->insertGetId([
                    'name' => $item['nama'],
                    'nim' => $item['nim'],
                    'prodi' => $item['lembaga'],
                    'role' => 'mahasiswa',
                    'email' => strtolower(str_replace(' ', '', $item['nama'])) . '@gmail.com',
                    'password' => bcrypt('password123')
                ]);
            } else {
                $userId = $user->id ?? $user->id_users;
            }

            // 2. Cari ID Ruangan berdasarkan namanya (GKM 4.1)
            $ruangan = DB::table('ruangan')->where('nama_ruangan', $item['ruangan'])->first();
            $ruanganId = $ruangan ? ($ruangan->id ?? $ruangan->id_ruangan) : 1; // Fallback ke ID 1 jika tidak ketemu

            // 3. Masukkan data ke tabel laporan
            DB::table('laporan')->insert([
                'id_users' => $userId,
                'id_ruangan' => $ruanganId,
                'status_laporan' => $item['status'],
                'deskripsi_laporan' => implode("\n", $item['description']), // Gabungkan array jadi string teks panjang
                'tanggal_laporan' => Carbon::now(),
            ]);
        }
    }
}