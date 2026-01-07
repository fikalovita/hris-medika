<?php

namespace App\Models;

use App\Models\User;
use App\Models\Bidang;
use App\Models\Posisi;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\PegawaiLvl;
use App\Models\Perusahaan;
use App\Models\KelompokUmur;
use App\Models\PtkpSttsAnak;
use App\Models\PegawaiJnsKaryawan;
use App\Models\PegawaiGolPekerjaan;
use App\Models\PegawaiJnsPekerjaan;
use App\Models\PegawaiKelGolPekerjaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'kd_provinsi');
    }
    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class, 'kd_kabupaten');
    }
    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class, 'kd_kelurahan');
    }
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'kd_kecamatan');
    }
    public function pegawai_bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'kd_bidang');
    }
    public function pegawai_posisi(): BelongsTo
    {
        return $this->belongsTo(Posisi::class, 'kd_posisi');
    }
    public function pegawai_lvl(): BelongsTo
    {
        return $this->belongsTo(PegawaiLvl::class, 'kd_lvl_manager');
    }
    public function kelompok_umur(): BelongsTo
    {
        return $this->belongsTo(KelompokUmur::class, 'kd_kelompok_umur');
    }
    public function pegawai_jns_pekerjaan(): BelongsTo
    {
        return $this->belongsTo(PegawaiJnsPekerjaan::class, 'kd_jns_pekerjaan');
    }
    public function pegawai_jns_karyawan(): BelongsTo
    {
        return $this->belongsTo(PegawaiJnsKaryawan::class, 'kd_jns_karyawan');
    }
    public function pegawai_gol_pekerjaan(): BelongsTo
    {
        return $this->belongsTo(PegawaiGolPekerjaan::class, 'kd_gol_pekerjaan');
    }
    public function pegawai_kel_gol_pekerjaan(): BelongsTo
    {
        return $this->belongsTo(PegawaiKelGolPekerjaan::class, 'kd_kelompok_gol_pekerjaan');
    }
    public function ptkp_stts_anak(): BelongsTo
    {
        return $this->belongsTo(PtkpSttsAnak::class, 'kd_ptkp_status_anak');
    }
    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo(Perusahaan::class, 'kd_perusahaan');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nrp', 'nrp');
    }
}
