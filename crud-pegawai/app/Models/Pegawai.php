<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\Kontrak;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama','jabatan','status_kontrak','email'
    ];

    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class, 'kontrak_id','id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id','id');
    }
}
