<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'pegawai_bidang';
    protected $primaryKey = 'kd_bidang';
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_bidang', 'nm_bidang'];
}
