<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';
    protected $primaryKey = 'kd_kabupaten';
    public $timestamps = false;

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function provinsi(): BelongsTo {
        return $this->belongsTo(Provinsi::class);
    }

    public function kecamatan(): HasMany {
        return $this->hasMany(Kecamatan::class, 'kd_kabupaten', 'kd_kabupaten');
    }

}
