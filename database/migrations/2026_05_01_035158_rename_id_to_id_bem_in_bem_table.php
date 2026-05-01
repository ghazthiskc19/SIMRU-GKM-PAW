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
        Schema::table('bem', function (Blueprint $table) {
            $table->renameColumn('id', 'id_bem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bem', function (Blueprint $table) {
            $table->renameColumn('id_users', 'id_bem');
        });
    }
};
