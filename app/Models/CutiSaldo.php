<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CutiSaldo extends Model
{
    use HasFactory;

    protected $table = 'cuti_saldo';
    protected $fillable = ['kd_saldo', 'nrp', 'jatuh_tempo', 'cuti_berakhir', 'cuti_berikut', 'hak_cuti', 'cuti_diambil','saldo_cuti'];
    protected $primaryKey = 'kd_saldo';
    public $keyType = 'string';
    public $timestamps = false;
}
