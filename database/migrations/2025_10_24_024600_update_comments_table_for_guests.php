<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add guest_name column if not exists
        Schema::table('comments', function (Blueprint $table) {
            if (!Schema::hasColumn('comments', 'guest_name')) {
                $table->string('guest_name')->nullable()->after('user_id');
            }
        });

        // Make user_id nullable using raw SQL to avoid requiring doctrine/dbal
        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            // Adjust the column to be nullable while preserving unsigned bigint
            DB::statement('ALTER TABLE `comments` MODIFY `user_id` BIGINT UNSIGNED NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE comments ALTER COLUMN user_id DROP NOT NULL');
        } elseif ($driver === 'sqlite') {
            // SQLite does not support altering column nullability easily; skip
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert user_id to not nullable (best effort)
        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE `comments` MODIFY `user_id` BIGINT UNSIGNED NOT NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE comments ALTER COLUMN user_id SET NOT NULL');
        }

        // Drop guest_name column if exists
        Schema::table('comments', function (Blueprint $table) {
            if (Schema::hasColumn('comments', 'guest_name')) {
                $table->dropColumn('guest_name');
            }
        });
    }
};
