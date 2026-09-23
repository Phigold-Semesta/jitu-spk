<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria'; // Primary Key kustom
    protected $fillable = ['kode_kriteria', 'nama_kriteria', 'jenis', 'bobot'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_kriteria', 'id_kriteria');
    }
}
