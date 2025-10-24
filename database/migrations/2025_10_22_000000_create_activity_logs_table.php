<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('activity_type'); // 'admin_post', 'user_register', 'user_login', 'user_like', 'user_comment'
            $table->string('activity_name'); // Deskripsi aktivitas
            $table->string('user_type'); // 'Admin', 'User', 'System'
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('status')->default('Berhasil'); // 'Berhasil', 'Gagal', 'Pending'
            $table->text('description')->nullable(); // Detail tambahan
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->index('activity_type');
            $table->index('user_type');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
}
