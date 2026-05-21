<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default test user (idempotent)
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'nim' => '021',
                'password' => Hash::make('123'),
                'prodi' => 'Teknik Informatika',
                'role' => 'mahasiswa',
                'foto' => null,
            ]
        );

        // Call project seeders to populate example data
        $this->call([
            UsersSeeder::class,
            StaffSeeder::class,
            RuanganSeeder::class,
            PeminjamanSeeder::class,
            LaporanSeeder::class,
            BemSeeder::class,
        ]);
    }
}
