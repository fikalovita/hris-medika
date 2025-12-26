<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\Kabupaten;
use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $primaryKey = 'kd_kecamatan';
    public $timestamps = false;

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_kecamatan');
    }
    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class, 'kd_kabupaten');
    }

    public function kelurahan() : HasMany {
        return $this->hasMany(Kelurahan::class, 'kd_kecamatan');
    }

    
}
