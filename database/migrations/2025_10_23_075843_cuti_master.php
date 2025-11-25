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
        Schema::create('cuti_master', function (Blueprint $table) {
            $table->string('kd_jenis_cuti')->primary();
            $table->string('nm_jenis_cuti');
            $table->string('kd_kategori');
            $table->string('durasi');
            $table->string('indikator');
            $table->text('syarat');
            $table->boolean('reset_tahunan');

            $table->foreign('kd_kategori')->references('kd_kategori')->on('cuti_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
