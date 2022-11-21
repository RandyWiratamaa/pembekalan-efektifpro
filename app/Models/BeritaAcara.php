<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    use HasFactory;

    protected $table = 'berita_acara';
    protected $dates = ['tanggal'];

    public function pembekalan()
    {
        return $this->belongsTo(Pembekalan::class, 'pembekalan_uuid', 'uuid');
    }

    public function bpo()
    {
        return $this->belongsTo(Bpo::class, 'approved_by', 'id');
    }
}
