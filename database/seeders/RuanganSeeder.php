<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         DB::table('ruangan')->insert([
            [
                "nama_ruangan"=> "GKM 4.1",
                "status_ruangan"=> "Tersedia",
                "fasilitas"=> "AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone",
                "kapasitas"=> "80 Orang",
                "lokasi"=> "Gedung GKM lantai 4 Fakultas Ilmu Komputer",
                "path_images"=> json_encode (["/images/hero_ruangan.png", "/images/hero_ruangan.png", "/images/hero_ruangan.png" ]),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "nama_ruangan"=> "GKM 4.2",
                "status_ruangan"=> "Tersedia",
                "fasilitas"=> "AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone",
                "kapasitas"=> "80 Orang",
                "lokasi"=> "Gedung GKM lantai 4 Fakultas Ilmu Komputer",
                "path_images"=> json_encode ( ["/images/hero_ruangan.png", "/images/hero_ruangan.png", "/images/hero_ruangan.png" ]),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "nama_ruangan"=> "GKM 4.3",
                "status_ruangan"=> "Tersedia",
                "fasilitas"=> "AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone",
                "kapasitas"=> "80 Orang",
                "lokasi"=> "Gedung GKM lantai 4 Fakultas Ilmu Komputer",
                "path_images"=> json_encode ( ["/images/hero_ruangan.png", "/images/hero_ruangan.png", "/images/hero_ruangan.png" ]),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "nama_ruangan"=>"GKM Lantai 1",
                "status_ruangan"=>"Tersedia",
                "fasilitas"=>"AC, Sound System, In Focus, Layer In Focus, Meja Panjang, Kursi, Microphone",
                "kapasitas"=>"200 Orang",
                "lokasi"=>"Gedung GKM lantai 1 Fakultas Ilmu Komputer",
                "path_images"=> json_encode (["/images/hero_ruangan.png", "/images/hero_ruangan.png", "/images/hero_ruangan.png" ]),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
         ]);
    }
}
