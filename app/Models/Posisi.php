<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;

    protected $table = 'pegawai_posisi';
    protected $primaryKey = 'kd_posisi';
    public $keyType = 'string';
    protected $fillable = ['kd_posisi', 'nm_posisi'];
    public $timestamps = false;
}
