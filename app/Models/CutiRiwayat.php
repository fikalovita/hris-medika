<?php

namespace App\Models;

use App\Models\CutiMaster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CutiRiwayat extends Model
{
    use HasFactory;

    protected $table = 'cuti_riwayat';
    protected $fillable = ['kd_riwayat', 'nrp', 'kd_jenis_cuti', 'tgl_mulai', 'tgl_akhir', 'durasi', 'keterangan', 'status', 'tgl_pengajuan'];
    protected $primaryKey = 'kd_saldo';
    public $keyType = 'string';
    public $timestamps = false;

    public function cuti_master(): HasMany {
        return $this->hasMany(CutiMaster::class, 'kd_jenis_cuti');
    }
}
