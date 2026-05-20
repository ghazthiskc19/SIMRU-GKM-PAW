<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bem', function (Blueprint $table) {
            if (!Schema::hasColumn('bem', 'email')) {
                $table->string('email')->nullable()->after('name');
            }

            if (!Schema::hasColumn('bem', 'password')) {
                $table->string('password')->after('email');
            }

            if (!Schema::hasColumn('bem', 'prodi')) {
                $table->string('prodi')->nullable()->after('password');
            }

            if (!Schema::hasColumn('bem', 'role')) {
                $table->string('role')->default('bem')->after('prodi');
            }

            if (!Schema::hasColumn('bem', 'foto')) {
                $table->string('foto')->nullable()->after('role');
            }
        });

        DB::table('bem')
            ->whereNull('email')
            ->orWhere('email', '')
            ->update([
                'email' => DB::raw("concat(nim, '@bem.test')"),
            ]);

        $hasIndex = collect(DB::select("SHOW INDEX FROM bem WHERE Key_name = 'bem_email_unique'"))->isNotEmpty();
        if (!$hasIndex) {
            Schema::table('bem', function (Blueprint $table) {
                $table->unique('email');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bem', function (Blueprint $table) {
            if (Schema::hasColumn('bem', 'foto')) {
                $table->dropColumn('foto');
            }
            if (Schema::hasColumn('bem', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('bem', 'prodi')) {
                $table->dropColumn('prodi');
            }
            if (Schema::hasColumn('bem', 'password')) {
                $table->dropColumn('password');
            }
            if (Schema::hasColumn('bem', 'email')) {
                $table->dropColumn('email');
            }
        });
    }
};
