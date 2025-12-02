<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $table = 'pegawai';
    public $timestamps = false;
    protected $fillable = [

        'id',
        'nrp',
        'nm_pegawai',
        'nm_pegawai_tmb',
        'pekerja_aktif',
        'jk',
        'negara_kelahiran',
        'kota_kelahiran',
        'tgl_lahir',
        'usia',
        'kd_kelompok_umur',
        'alamat_utama',
        'alamat_kedua',
        'kd_kelurahan',
        'kd_kecamatan',
        'kd_kabupaten',
        'kd_provinsi',
        'kode_pos',
        'no_telepon_utama',
        'no_telepon_kedua',
        'email_utama',
        'email_kedua',
        'tmt',
        'stts_menikah',
        'kd_ptkp_status_anak',
        'kd_perusahaan',
        'kd_bidang',
        'tgl_pengangkatan',
        'kd_posisi',
        'kd_lvl_manager',
        'kd_gol_pekerjaan',
        'kd_kelompok_gol_pekerjaan',
        'kd_jns_pekerjaan',
        'kd_jns_karyawan',
        'kd_manager',
        'no_ktp',
        'passport',
        'bpjs_ket',
        'nm_ibu',
        'kontak_darurat',
    ];

    public function provinsi(): HasOne
    {
        return $this->hasOne(Provinsi::class);
    }
}
