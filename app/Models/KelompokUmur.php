<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelompokUmur extends Model
{
    use HasFactory;
    protected $table = 'kelompok_umur';
    protected $primaryKey = 'kd_kelompok_umur';
    protected $fillable = ['kd_kelompok_umur', 'nm_kelompok_umur'];
    public $incrementing = false;
    public $timestamps = false;
    public $keyType = 'String';

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_kelompok_umur', 'kd_kelompok_umur');
    }
}
