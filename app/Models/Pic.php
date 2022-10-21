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

    public function Pembekalan()
    {
        return $this->belongsToMany(Pembekalan::class, 'pembekalan_pic', 'pic_id', 'pembekalan_id');
    }
}
