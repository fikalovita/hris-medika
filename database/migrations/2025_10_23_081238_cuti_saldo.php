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
        Schema::create('cuti_saldo', function (Blueprint $table) {
            $table->string('kd_saldo')->primary();
            $table->string('nrp');
            $table->string('jatuh_tempo');
            $table->date('cuti_berakhir');
            $table->date('cuti_berikut');
            $table->string('hak_cuti');
            $table->string('cuti_diambil');
            $table->bigInteger('saldo_cuti');

            $table->foreign('nrp')->references('nrp')->on('pegawai');
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
