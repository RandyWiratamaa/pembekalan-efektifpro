<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratPenawaran extends Model
{
    use HasFactory;

    protected $table = 'surat_penawaran';
    protected $dates = ['tgl_surat', 'created_at'];
    protected $fillable = [
        'no_surat', 'bank_id', 'pembekalan_id', 'perihal', 'body'
    ];
    protected $casts = ['is_approved'];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    public function pembekalan()
    {
        return $this->belongsTo(Pembekalan::class, 'pembekalan_id', 'id');
    }
}
