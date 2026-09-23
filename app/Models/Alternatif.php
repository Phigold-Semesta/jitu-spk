<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $primaryKey = 'id_alternatif'; // Primary Key kustom
    protected $fillable = ['kode_alternatif', 'nama_ikan'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'id_alternatif', 'id_alternatif');
    }
}
