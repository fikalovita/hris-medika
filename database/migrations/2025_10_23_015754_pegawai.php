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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nrp')->unique();
            $table->string('nm_pegawai');
            $table->string('nm_pegawai_tmb');
            $table->enum('pekerja_aktif', ['Ya', 'Tidak'])->default('Ya');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('negara_kelahiran');
            $table->string('kota_kelahiran');
            $table->date('tgl_lahir');
            $table->string('usia');
            $table->string('kd_kelompok_umur', 10);
            $table->text('alamat_utama');
            $table->text('alamat_kedua');
            $table->string('kd_kelurahan', 10);
            $table->string('kd_kecamatan', 10);
            $table->string('kd_kabupaten', 10);
            $table->string('kd_provinsi', 10);
            $table->string('kode_pos');
            $table->string('no_telepon_utama');
            $table->string('no_telepon_kedua');
            $table->string('email_utama');
            $table->string('email_kedua');
            $table->date('tmt');
            $table->enum('stts_menikah', ['Kawin', 'Belum Kawin', 'Cerai Mati', 'Cerai Hidup'])->default('Belum Kawin');
            $table->string('kd_ptkp_status_anak', 5);
            $table->string('kd_perusahaan', 255);
            $table->string('kd_bidang', 5);
            $table->date('tgl_pengangkatan');
            $table->string('kd_posisi', 255);
            $table->string('kd_lvl_manager', 5);
            $table->string('kd_gol_pekerjaan', 5);
            $table->string('kd_kelompok_gol_pekerjaan', 10);
            $table->string('kd_jns_pekerjaan', 10);
            $table->string('kd_jns_karyawan', 10);
            $table->string('kd_manager', 10);
            $table->string('no_ktp', 16);
            $table->string('passport');
            $table->string('bpjs_ket');
            $table->string('nm_ibu');
            $table->date('kontak_darurat');

            $table->foreign('kd_kelompok_umur')->references('kd_kelompok_umur')->on('kelompok_umur');
            $table->foreign('kd_posisi')->references('kd_posisi')->on('pegawai_posisi');
            $table->foreign('kd_bidang')->references('kd_bidang')->on('pegawai_bidang');
            $table->foreign('kd_perusahaan')->references('kd_perusahaan')->on('perusahaan');
            $table->foreign('kd_ptkp_status_anak')->references('kd_ptkp')->on('ptkp_stts_anak');
            $table->foreign('kd_jns_karyawan')->references('kd_jns_karyawan')->on('pegawai_jns_karyawan');
            $table->foreign('kd_jns_pekerjaan')->references('kd_jns_pekerjaan')->on('pegawai_jns_pekerjaan');
            $table->foreign('kd_kelompok_gol_pekerjaan')->references('kd_kelompok_gol_pekerjaan')->on('pegawai_kel_gol_pekerjaan');
            $table->foreign('kd_lvl_manager')->references('kd_lvl')->on('pegawai_lvl');
            $table->foreign('kd_gol_pekerjaan')->references('kd_gol_pekerjaan')->on('pegawai_gol_pekerjaan');
            $table->foreign('kd_kelurahan')->references('kd_kelurahan')->on('kelurahan');
            $table->foreign('kd_kecamatan')->references('kd_kecamatan')->on('kecamatan');
            $table->foreign('kd_kabupaten')->references('kd_kabupaten')->on('kabupaten');
            $table->foreign('kd_provinsi')->references('kd_provinsi')->on('provinsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pegawai');
    }
};
