<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LaporanMasalahTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::dropIfExists('laporan');
        Schema::dropIfExists('ruangan');
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table): void {
            $table->id('id_users');
            $table->string('nim')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('prodi');
            $table->string('role');
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        Schema::create('ruangan', function (Blueprint $table): void {
            $table->id('id_ruangan');
            $table->string('nama_ruangan')->unique();
            $table->string('status_ruangan');
            $table->string('fasilitas');
            $table->string('kapasitas');
            $table->string('lokasi');
            $table->json('path_images')->nullable();
            $table->timestamps();
        });

        Schema::create('laporan', function (Blueprint $table): void {
            $table->id('id_laporan');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_ruangan');
            $table->string('status_laporan');
            $table->string('path_foto')->nullable();
            $table->dateTime('tanggal_laporan');
            $table->string('deskripsi_laporan');
            $table->timestamps();
        });
    }

    public function test_mahasiswa_can_submit_laporan_masalah_to_database(): void
    {
        $user = User::factory()->create([
            'name' => 'Budi Mahasiswa',
            'nim' => '225150700111001',
            'prodi' => 'Teknik Informatika',
            'role' => 'mahasiswa',
        ]);

        $ruanganId = DB::table('ruangan')->insertGetId([
            'nama_ruangan' => 'GKM 4.1',
            'status_ruangan' => 'Tersedia',
            'fasilitas' => 'Proyektor',
            'kapasitas' => '40',
            'lokasi' => 'Lantai 4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->actingAs($user)->post(route('laporan-masalah.store'), [
            'ruangan' => 'gkm4.1',
            'tanggal' => '2026-06-10',
            'waktu' => '09:30',
            'permasalahan' => 'AC ruangan tidak menyala.',
        ]);

        $response->assertRedirect(route('riwayat-laporan'));

        $this->assertDatabaseHas('laporan', [
            'id_users' => $user->id_users,
            'id_ruangan' => $ruanganId,
            'status_laporan' => 'Sedang Ditinjau',
            'deskripsi_laporan' => "Nama: Budi Mahasiswa\nNIM: 225150700111001\nProgram Studi: Teknik Informatika\nDetail Laporan: AC ruangan tidak menyala.",
        ]);
    }
}
