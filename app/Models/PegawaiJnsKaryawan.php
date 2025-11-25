<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiJnsKaryawan extends Model
{
    use HasFactory;
    protected $table = 'pegawai_jns_karyawan';
    protected $primaryKey = 'kd_jns_karyawan';
    public $keyType = 'String';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['kd_jns_karyawan', 'nm_jns_karyawan'];
}
