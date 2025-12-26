<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsi';
    protected $primaryKey = 'kd_provinsi';
    public $timestamps = false;

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_provinsi');
    }

    public function kabupaten(): HasMany
    {
        return $this->hasMany(Kabupaten::class, 'kd_provinsi');
    }
}
