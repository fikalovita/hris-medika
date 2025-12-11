<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PegawaiJnsKaryawan extends Model
{
    use HasFactory;
    protected $table = 'pegawai_jns_karyawan';
    protected $primaryKey = 'kd_jns_karyawan';
    public $keyType = 'String';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['kd_jns_karyawan', 'nm_jns_karyawan'];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_jns_karyawan', 'kd_jns_karyawan');
    }
}
