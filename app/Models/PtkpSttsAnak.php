<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PtkpSttsAnak extends Model
{
    use HasFactory;

    protected $table = 'ptkp_stts_anak';
    protected $primaryKey = 'kd_ptkp';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_ptkp', 'nm_ptkp'];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_ptkp_status_anak');
    }
}
