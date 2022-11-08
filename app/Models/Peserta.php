<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';

    protected $fillable = [
        'nik', 'nama', 'jenkel', 'nohp', 'jabatan', 'email_kantor', 'email_pribadi', 'alamat', 'pembekalan_uuid'
    ];
}
