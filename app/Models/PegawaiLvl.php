<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PegawaiLvl extends Model
{
    use HasFactory;
    protected $table = 'pegawai_lvl';
    protected $primaryKey = 'kd_lvl';
    public $incrementing = false;
    public $keyType = 'String';
    public $timestamps = false;
    protected $fillable = ['kd_lvl', 'nm_lvl'];

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'kd_lvl_manager');
    }
}
