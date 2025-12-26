<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PegawaiGolPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pegawai_gol_pekerjaan';
    protected $primaryKey = 'kd_gol_pekerjaan';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_gol_pekerjaan', 'nm_gol_pekerjaan'];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_gol_pekerjaan');
    }
}
