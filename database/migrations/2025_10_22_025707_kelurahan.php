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
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->char('kd_kelurahan', 10)->primary();
            $table->char('kd_kecamatan', 6);
            $table->string('nm_kelurahan');
            $table->foreign('kd_kecamatan')->references('kd_kecamatan')->on('kecamatan');
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
