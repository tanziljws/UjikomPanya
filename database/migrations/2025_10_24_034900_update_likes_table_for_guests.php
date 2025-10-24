<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add guest_token column if not exists
        Schema::table('likes', function (Blueprint $table) {
            if (!Schema::hasColumn('likes', 'guest_token')) {
                $table->uuid('guest_token')->nullable()->after('user_id');
                $table->index(['guest_token', 'galeri_id']);
            }
        });

        // Make user_id nullable so guest likes can be stored
        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE `likes` MODIFY `user_id` BIGINT UNSIGNED NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE likes ALTER COLUMN user_id DROP NOT NULL');
        }
    }

    public function down(): void
    {
        // Revert user_id to NOT NULL (best effort)
        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE `likes` MODIFY `user_id` BIGINT UNSIGNED NOT NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE likes ALTER COLUMN user_id SET NOT NULL');
        }

        Schema::table('likes', function (Blueprint $table) {
            if (Schema::hasColumn('likes', 'guest_token')) {
                $table->dropIndex(['guest_token', 'galeri_id']);
                $table->dropColumn('guest_token');
            }
        });
    }
};
