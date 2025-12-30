<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriCuti extends Model
{
    use HasFactory;

    protected $table = 'cuti_kategori';

    protected $primaryKey = 'kd_kategori';
    public $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kd_kategori',
        'nm_kategori'
    ];

    public $timestamps = false;

    public function cuti_master(): HasMany
    {
        return $this->hasMany(CutiMaster::class, 'kd_kategori', 'kd_kategori');
    }
}
