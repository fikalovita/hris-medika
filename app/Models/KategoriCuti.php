<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriCuti extends Model
{
    use HasFactory;

    protected $table = 'cuti_kategori';
    protected $fillable = ['kd_kategori', 'nm_kategori'];
    protected $primaryKey = 'kd_kategori';
    public $keyType = 'string';
    public $timestamps = false;
}
