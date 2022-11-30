<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    use HasFactory;
    protected $table = 'penyelenggara';
    protected $fillable = ['nama', 'singkatan'];

    public function surat_penawaran()
    {
        return $this->hasMany(SuratPenawaran::class, 'penyelenggara_id', 'id');
    }

    public function surat_penegasan()
    {
        return $this->hasMany(SuratPenawaran::class, 'penyelenggara_id', 'id');
    }
}
