<?php

namespace App\Models;

use App\Models\CutiRiwayat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CutiPersetujuan extends Model
{
    use HasFactory;

    protected $table = 'cuti_persetujuan';
    protected $fillable = ['kd_persetujuan', 'kd_riwayat', 'nrp_manager', 'status_persetujuan', 'tgl_persetujuan'];
    protected $primaryKey = 'kd_persetujuan';
    public $keyType = 'string';
    public $timestamps = false;

    public function cuti_riwayat() : BelongsTo {
        return $this->belongsTo(CutiRiwayat::class, 'kd_riwayat');
    }
}
