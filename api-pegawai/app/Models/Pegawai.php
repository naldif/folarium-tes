<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nama','no_telp','email', 'alamat'
    ];
}
