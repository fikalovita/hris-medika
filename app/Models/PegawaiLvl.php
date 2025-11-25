<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiLvl extends Model
{
    use HasFactory;
    protected $table = 'pegawai_lvl';
    protected $primaryKey = 'kd_lvl';
    public $incrementing = false;
    public $keyType = 'String';
    public $timestamps = false;
    protected $fillable = ['kd_lvl', 'nm_lvl'];
}
