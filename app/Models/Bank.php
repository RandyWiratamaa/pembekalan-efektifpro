<?php

namespace App\Models;

use App\Models\Pic;
use App\Models\JenisBank;
use App\Models\Pembekalan;
use App\Models\SuratPenawaran;
use App\Models\SuratPenegasan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

class Bank extends Model
{
    use HasFactory, LaravelVueDatatableTrait;
    
    protected $table = 'bank';
    protected $dates = ['created_at'];
    protected $fillable = [
        'nama', 'jenis_id','telephone', 'email', 'alamat', 'kota'
    ];

    public function jenis_bank()
    {
        return $this->belongsTo(JenisBank::class, 'jenis_id', 'id');
    }

    public function pic()
    {
        return $this->hasMany(Pic::class, 'bank_id', 'id');
    }

    public function surat_penawaran()
    {
        return $this->hasMany(SuratPenawaran::class, 'bank_id', 'id');
    }

    public function surat_penegasan()
    {
        return $this->hasMany(SuratPenegasan::class, 'bank_id', 'id');
    }

    public function pembekalan()
    {
        return $this->hasMany(Pembekalan::class, 'bank_id', 'id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'bank_id', 'id');
    }
}
