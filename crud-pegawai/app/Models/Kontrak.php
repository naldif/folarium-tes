<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kontrak'
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'jabatan_id');
    }
}
