<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posisi extends Model
{
    use HasFactory;

    protected $table = 'pegawai_posisi';
    protected $primaryKey = 'kd_posisi';
    public $keyType = 'string';
    protected $fillable = ['kd_posisi', 'nm_posisi'];
    public $timestamps = false;

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_posisi', 'kd_posisi');
    }
}
