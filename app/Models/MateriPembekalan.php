<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriPembekalan extends Model
{
    use HasFactory;
    protected $table = 'materi_pembekalan';

    public function pembekalan()
    {
        return $this->hasMany(Pembekalan::class, 'materi_id', 'id');
    }

    public function surat_penawaran()
    {
        return $this->hasMany(SuratPenawaran::class, 'materi_id', 'id');
    }
}
