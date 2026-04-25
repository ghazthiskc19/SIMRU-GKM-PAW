<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bem')->insert([
            [
                "nim"=>"501",
                "name"=>"Skibidi 67",
                "jabatan"=> "Ketua BEM",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "nim"=>"327",
                "name"=>"Amba de Kham",
                "jabatan"=> "Wakil Ketua BEM",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "nim"=>"99",
                "name"=>"King Nasir",
                "jabatan"=> "Anggota BEM",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
            
        ]);
    }
}
