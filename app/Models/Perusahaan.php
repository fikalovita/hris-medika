<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $primaryKey = 'kd_perusahaan';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['kd_perusahaan', 'nm_perusahaan'];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_perusahaan', 'kd_perusahaan');
    }
}
