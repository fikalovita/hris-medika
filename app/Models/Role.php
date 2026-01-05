<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role_user';
    protected $primaryKey = 'id_role';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['nama_role'];

    public function pegawai(): HasMany
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
