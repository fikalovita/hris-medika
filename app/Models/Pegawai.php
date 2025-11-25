<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasUuids, HasFactory;

    protected $table = 'pegawai';
    public $timestamps = false;

    public function provinsi(): HasOne
    {
        return $this->hasOne(Provinsi::class);
    }
}
