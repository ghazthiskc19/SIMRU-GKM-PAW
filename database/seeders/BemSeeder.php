<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class BemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bem')->insertOrIgnore([
            [
                "nim"=>"501",
                "name"=>"Skibidi 67",
                "email"=>"bem1@filkom.test",
                "password"=> Hash::make("123"),
                "prodi"=> "Teknik Perhutanan",
                "role"=> "bem",
                "foto"=> "images/photo_bem_1.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "nim"=>"327",
                "name"=>"Amba de Kham",
                "email"=>"bem2@filkom.test",
                "password"=> Hash::make("123"),
                "prodi"=> "Teknik Perhutanan",
                "role"=> "bem",
                "foto"=> "images/photo_bem_2.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "nim"=>"99",
                "name"=>"King Nasir",
                "email"=>"bem3@filkom.test",
                "password"=> Hash::make("123"),
                "prodi"=> "Teknik Informatika",
                "role"=> "bem",
                "foto"=> "images/photo_bem_3.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ]);
    }
}
