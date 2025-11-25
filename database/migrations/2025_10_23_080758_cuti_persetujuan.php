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
        Schema::create('cuti_persetujuan', function (Blueprint $table) {
            $table->string('kd_persetujuan')->primary();
            $table->string('kd_riwayat');
            $table->string('nrp_manager');
            $table->enum('status_persetujuan', ['Diajukan', 'Disetujui', 'Ditolak']);
            $table->timestamp('tgl_persetujuan');

            $table->foreign('kd_riwayat')->references('kd_riwayat')->on('cuti_riwayat');
            $table->foreign('nrp_manager')->references('nrp')->on('pegawai');
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
