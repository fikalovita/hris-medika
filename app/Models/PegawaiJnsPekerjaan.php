<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiJnsPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pegawai_jns_pekerjaan';
    protected $primaryKey = 'kd_jns_pekerjaan';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_jns_pekerjaan', 'nm_jns_pekerjaan'];
}
