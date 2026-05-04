<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    public function run()
    {
        $dataPeminjaman = [
            [
                "ruangan_id" => 1, "nama" => "Prabowo Subianto", "nim" => "212", "prodi" => "Teknik Persawitan",
                "tanggal_pemakaian" => "2026-04-18", "jam_mulai" => "11:41", "jam_selesai" => "17:41",
                "alasan_peminjaman" => "saasd", "dokumen" => ["dokumen/BSMKD9HQ0Rv1ucxD0sCqMpv8agiAd4CNOeIfs4B5.pdf"], "status" => "Proses Pengajuan"
            ],
            [
                "ruangan_id" => 2, "nama" => "raaaa", "nim" => "245150207111052", "prodi" => "Hukum",
                "tanggal_pemakaian" => "2026-04-25", "jam_mulai" => "16:42", "jam_selesai" => "17:42",
                "alasan_peminjaman" => "raa", "dokumen" => ["dokumen/dy05tDXaqvwm03DnhsXrfw9SpSmf5CFtVUaEy7Yi.pdf"], "status" => "Proses Pengajuan"
            ],
            [
                "ruangan_id" => 1, "nama" => "Jokowi", "nim" => "67", "prodi" => "Hutan",
                "tanggal_pemakaian" => "2026-04-30", "jam_mulai" => "11:42", "jam_selesai" => "12:42",
                "alasan_peminjaman" => "sadasd", "dokumen" => ["dokumen/wSFxoXDXkSJWtAhvyQoeKmUj5PkGmhbFMsVLz3JX.pdf"], "status" => "Proses Pengajuan"
            ],
            [
                "ruangan_id" => 1, "nama" => "Bahlil", "nim" => "666", "prodi" => "Kenegaraan",
                "tanggal_pemakaian" => "2026-04-20", "jam_mulai" => "11:34", "jam_selesai" => "17:34",
                "alasan_peminjaman" => "Iseng", "dokumen" => ["dokumen/kU54Yq8qtXBbX3FWv2iiNfYXLxpFmrYZyS95M8Fq.pdf"], "status" => "Proses Pengajuan"
            ],
            [
                "ruangan_id" => 1, "nama" => "Arsyad", "nim" => "adasdasd", "prodi" => "asdasdasd",
                "tanggal_pemakaian" => "2026-03-30", "jam_mulai" => "05:30", "jam_selesai" => "23:36",
                "alasan_peminjaman" => "asdasdasd", "dokumen" => ["dokumen/nursB6Ru0emeQE4J0i849sZb6z5iZY3ALT12YWKz.pdf"], "status" => "Proses Pengajuan"
            ]
        ];

        foreach ($dataPeminjaman as $item) {
            // 1. Cari user berdasarkan NIM, kalau tidak ada buat dummy user baru
            $user = DB::table('users')->where('nim', $item['nim'])->first();
            if (!$user) {
                $userId = DB::table('users')->insertGetId([
                    'name' => $item['nama'],
                    'nim' => $item['nim'],
                    'prodi' => $item['prodi'],
                    'role' => 'mahasiswa',
                    'email' => strtolower(str_replace(' ', '', $item['nama'])) . '@gmail.com',
                    'password' => bcrypt('password123')
                ]);
            } else {
                $userId = $user->id ?? $user->id_users; // Sesuaikan dengan nama kolom ID di tabel users
            }

            // 2. Masukkan data ke tabel peminjaman
            DB::table('peminjaman')->insert([
                'id_users' => $userId,
                'id_ruangan' => $item['ruangan_id'],
                'status_peminjaman' => $item['status'],
                'path_surat' => $item['dokumen'][0] ?? null,
                'nama_kegiatan' => $item['alasan_peminjaman'],
                'waktu_mulai' => $item['tanggal_pemakaian'] . ' ' . $item['jam_mulai'] . ':00',
                'waktu_selesai' => $item['tanggal_pemakaian'] . ' ' . $item['jam_selesai'] . ':00',
                'tanggal_pengajuan' => Carbon::now(),
            ]);
        }
    }
}