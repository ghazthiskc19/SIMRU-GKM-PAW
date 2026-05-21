<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insertOrIgnore([
            [
                'nip' => '1001001',
                'name' => 'Staff Administrasi',
                'email' => 'staff.adm@filkom.test',
                'password' => Hash::make('123'),
                'role' => 'administrasi',
                'foto' => 'images/photo_staff_adm.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
