<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpo extends Model
{
    use HasFactory;

    protected $table = 'bpo';

    public function surat_penawaran()
    {
        return $this->hasMany(SuratPenawaran::class, 'approved_by', 'id');
    }

    public function surat_penegasan()
    {
        return $this->hasMany(SuratPenegasan::class, 'approved_by', 'id');
    }
}
