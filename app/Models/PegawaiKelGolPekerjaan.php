<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PegawaiKelGolPekerjaan extends Model
{
    //use HasFactory;
    protected $table = 'pegawai_kel_gol_pekerjaan';
    protected $primaryKey = 'kd_kelompok_gol_pekerjaan';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_kelompok_gol_pekerjaan', 'nm_kelompok_gol_pekerjaan'];
}
