<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiGolPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pegawai_gol_pekerjaan';
    protected $primaryKey = 'kd_gol_pekerjaan';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_gol_pekerjaan', 'nm_gol_pekerjaan'];
}
