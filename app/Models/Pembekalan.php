<?php

namespace App\Models;

use App\Models\Pic;
use App\Models\LevelPembekalan;
use App\Models\MateriPembekalan;
use App\Models\MetodePembekalan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembekalan extends Model
{
    use HasFactory;
    protected $table = 'pembekalan';
    protected $dates = ['hari_tanggal', 'created_at', 'mulai', 'selesai'];
    protected $fillable = [
        'uuid', 'investasi', 'materi_id', 'level_id', 'mulai', 'selesai', 'metode_id', 'min_peserta'
    ];

    public function pic()
    {
        return $this->belongsTo(Pic::class, 'pic_id', 'id');
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

    public function surat_penawaran()
    {
        return $this->hasMany(SuratPenawaran::class, 'pembekalan_id', 'id');
    }

    public function surat_penegasan()
    {
        return $this->hasMany(SuratPenegasan::class, 'pembekalan_uuid', 'uuid');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id', 'id');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'pembekalan_uuid', 'uuid');
    }
}
