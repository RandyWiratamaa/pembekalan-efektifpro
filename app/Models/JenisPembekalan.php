<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPembekalan extends Model
{
    use HasFactory;
    protected $table = 'jenis_pembekalan';

    public function pembekalan()
    {
        return $this->hasMany(Pembekelan::class, 'jenis_id', 'id');
    }
}
