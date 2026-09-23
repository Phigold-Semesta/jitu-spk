<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna'; // Primary Key kustom
    protected $fillable = ['nama_lengkap', 'username', 'password', 'peran'];
    protected $hidden = ['password'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_pengguna', 'id_pengguna');
    }
}
