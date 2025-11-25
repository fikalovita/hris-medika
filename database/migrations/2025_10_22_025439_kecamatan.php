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
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->char('kd_kecamatan', 6)->primary();
            $table->char('kd_kabupaten', 4);
            $table->string('nm_kecamatan');
            $table->foreign('kd_kabupaten')->references('kd_kabupaten')->on('kabupaten');
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
