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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_ruangan');
            
            $table->string('status_laporan');
            $table->string('path_foto')->nullable();
            $table->dateTime('tanggal_laporan');
            $table->string('deskripsi_laporan');
            
            $table->timestamps();

            $table->foreign('id_users')->references('id_users')->on('users')->onDelete('cascade');
            $table->foreign('id_ruangan')->references('id_ruangan')->on('ruangan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
