<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Pembekalan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pic extends Model
{
    use HasFactory;
    protected $table = 'pic';
    protected $dates = ['tgl_lahir', 'created_at'];
    protected $fillable = [
        'nama', 'jenkel', 'no_hp', 'bank_id', 'alamat_rumah', 'email_pribadi', 'email_kantor', 'jabatan'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    public function pembekalan()
    {
        return $this->hasMany(Pembekalan::class, 'pic_id', 'id');
    }

    public function surat_penawaran()
    {
        return $this->hasMany(SuratPenawaran::class, 'pic_id', 'id');
    }

    public function surat_penegasan()
    {
        return $this->hasMany(SuratPenegasan::class, 'pic_id', 'id');
    }
}
