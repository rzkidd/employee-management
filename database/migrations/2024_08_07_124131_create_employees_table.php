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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->string('gender');
            $table->string('photo_url');
            $table->string('email');
            $table->string('no_telp');
            $table->string('provinsi');
            $table->string('kab/kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
