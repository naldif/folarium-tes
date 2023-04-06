<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use SoftDeletes;

    protected $date = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_jabatan',
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'jabatan_id');
    }
}
