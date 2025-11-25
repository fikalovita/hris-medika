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
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->char('kd_kabupaten', 4)->primary();
            $table->char('kd_provinsi',4);
            $table->string('nm_kabupaten');
            $table->foreign('kd_provinsi')->references('kd_provinsi')->on('provinsi');
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
