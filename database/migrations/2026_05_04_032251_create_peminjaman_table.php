<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman'); // Primary Key
            
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_bem')->nullable();
            $table->unsignedBigInteger('id_ruangan');
            
            $table->string('alasan_penolakan')->nullable();
            $table->string('status_peminjaman');
            $table->string('path_surat')->nullable();
            $table->string('nama_kegiatan');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->dateTime('tanggal_pengajuan');
            $table->timestamps();

            $table->foreign('id_users')->references('id_users')->on('users')->onDelete('cascade');
            $table->foreign('id_ruangan')->references('id_ruangan')->on('ruangan')->onDelete('cascade');
            
            $table->foreign('id_bem')->references('id_bem')->on('bem')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
