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
        if (Schema::hasColumn('bem', 'id') && !Schema::hasColumn('bem', 'id_bem')) {
            Schema::table('bem', function (Blueprint $table) {
                $table->renameColumn('id', 'id_bem');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('bem', 'id_bem') && !Schema::hasColumn('bem', 'id')) {
            Schema::table('bem', function (Blueprint $table) {
                $table->renameColumn('id_bem', 'id');
            });
        }
    }
};
