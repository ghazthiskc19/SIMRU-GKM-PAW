<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "email"=> "prabowo@gmail.com",
                "password"=> Hash::make("123"),
                "name"=> "Prabowo Subianto",
                "nim"=>"212",
                "prodi"=> "Teknik Persawitan",
                "role"=> "mahasiswa",
                "foto"=> "images/photo_user_mahasiswa.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "email"=> "bem@gmail.com",
                "password"=> Hash::make("123"),
                "name"=> "Skibidi 67",
                "nim"=> "501",
                "prodi"=> "Teknik Perhutanan",
                "role"=> "bem",
                "foto"=> "images/photo_user_bem.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "email"=> "wakilbem@gmail.com",
                "password"=> Hash::make("123"),
                "name"=> "Amba de Kham",
                "nim"=> "327",
                "prodi"=> "Teknik Perhutanan",
                "role"=> "bem",
                "foto"=> "images/photo_user_wakil_bem.jpg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            
        ]);
    }
}
