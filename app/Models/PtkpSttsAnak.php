<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PtkpSttsAnak extends Model
{
    use HasFactory;

    protected $table = 'ptkp_stts_anak';
    protected $primaryKey = 'kd_ptkp';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kd_ptkp', 'nm_ptkp'];
}
