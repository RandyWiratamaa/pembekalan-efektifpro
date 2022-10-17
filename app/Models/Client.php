<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'client';
    protected $dates = ['created_at'];
    protected $fillable = [
        'nama', 'alamat', 'kota', 'no_telp', 'kode_pos', 'pic', 'email_pic', 'jabatan_pic', 'kerjasama'
    ];
    protected $casts = ['kerjasama'];
}
