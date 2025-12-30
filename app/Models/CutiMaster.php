<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CutiMaster extends Model
{
    use HasFactory;

    protected $table = 'cuti_master';
    protected $fillable = ['kd_jenis_cuti', 'nm_jenis_cuti','kd_kategori','durasi','indikator','syarat','reset_tahunan'];
    protected $primaryKey = 'kd_jenis_cuti';
    public $keyType = 'string';
    public $timestamps = false;
 
    public function cuti_kategori(): BelongsTo {
        return $this->belongsTo(KategoriCuti::class,'kd_kategori');
    }

    public function cuti_riwayat() : BelongsTo {
        return $this->belongsTo(CutiMaster::class,'kd_jenis_cuti');
    }
}
