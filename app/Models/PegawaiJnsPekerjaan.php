<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PegawaiJnsPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pegawai_jns_pekerjaan';
    protected $primaryKey = 'kd_jns_pekerjaan';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_jns_pekerjaan', 'nm_jns_pekerjaan'];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_jns_pekerjaan');
    }
}
