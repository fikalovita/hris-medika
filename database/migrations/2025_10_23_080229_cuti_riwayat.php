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
        Schema::create('cuti_riwayat', function (Blueprint $table) {
            $table->string('kd_riwayat')->primary();
            $table->string('nrp');
            $table->string('kd_jenis_cuti');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->string('durasi');
            $table->text('keterangan');
            $table->enum('status', ['Diajukan', 'Disetujui', 'Ditolak']);
            $table->timestamp('tgl_pengajuan');

            $table->foreign('kd_jenis_cuti')->references('kd_jenis_cuti')->on('cuti_master');
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
