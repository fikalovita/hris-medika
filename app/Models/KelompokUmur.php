<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokUmur extends Model
{
    use HasFactory;
    protected $table = 'kelompok_umur';
    protected $primaryKey = 'kd_kelompok_umur';
    protected $fillable = ['kd_kelompok_umur', 'nm_kelompok_umur'];
    public $incrementing = false;
    public $timestamps = false;
    public $keyType = 'String';
}
