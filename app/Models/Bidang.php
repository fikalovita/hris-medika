<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'pegawai_bidang';
    protected $primaryKey = 'kd_bidang';
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_bidang', 'nm_bidang'];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_bidang');
    }
}
