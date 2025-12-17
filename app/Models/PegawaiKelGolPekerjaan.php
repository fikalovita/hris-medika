<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PegawaiKelGolPekerjaan extends Model
{
    //use HasFactory;
    protected $table = 'pegawai_kel_gol_pekerjaan';
    protected $primaryKey = 'kd_kelompok_gol_pekerjaan';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_kelompok_gol_pekerjaan', 'nm_kelompok_gol_pekerjaan'];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_kelompok_gol_pekerjaan', 'kd_kelompok_gol_pekerjaan');
    }
}
