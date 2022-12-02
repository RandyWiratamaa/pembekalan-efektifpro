<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPenegasan extends Model
{
    use HasFactory;
    protected $table = 'surat_penegasan';
    protected $dates = ['tgl_surat', 'created_at'];
    protected $fillable = [
        'no_surat', 'bank_id', 'pembekalan_id', 'perihal', 'body'
    ];
    protected $casts = ['is_approved'];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    public function metode_pembekalan()
    {
        return $this->belongsTo(MetodePembekalan::class, 'metode_id', 'id');
    }

    public function level_pembekalan()
    {
        return $this->belongsTo(LevelPembekalan::class, 'level_id', 'id');
    }

    public function materi_pembekalan()
    {
        return $this->belongsTo(MateriPembekalan::class, 'materi_id', 'id');
    }

    public function pembekalan()
    {
        return $this->belongsTo(Pembekalan::class, 'pembekalan_uuid', 'uuid');
    }

    public function bpo()
    {
        return $this->belongsTo(Bpo::class, 'approved_by', 'id');
    }

    public function jenis_pembekalan()
    {
        return $this->belongsTo(JenisPembekalan::class, 'jenis_id', 'id');
    }

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class, 'penyelenggara_id', 'id');
    }

    public function surat_penawaran()
    {
        return $this->hasOne(SuratPenawaran::class, 'no_surat', 'no_surat_penawaran');
    }
}
