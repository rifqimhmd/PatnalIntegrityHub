<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nip')->unique();
            $table->string('nama_lengkap');
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->string('no_wa', 20)->nullable();
            $table->string('password');
            $table->unsignedBigInteger('institusi_id')->nullable(); // hanya sekali
            $table->enum('nama_role', ['admin', 'pegawai', 'psikolog']);
            $table->boolean('is_active')->default(0);
            $table->enum('verifikasi', ['aktif', 'tidak aktif'])->default('tidak aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_user');
    }
};
