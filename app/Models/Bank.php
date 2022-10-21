<?php

namespace App\Models;

use App\Models\Pic;
use App\Models\JenisBank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{
    use HasFactory;
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
}
