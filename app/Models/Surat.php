<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $dates = [
        'tgl_surat', 'created_at'
    ];

    public function jenis_surat()
    {
        return $this->belongsTo('App\Models\JenisSurat', 'jenis_id', 'id');
    }
}
