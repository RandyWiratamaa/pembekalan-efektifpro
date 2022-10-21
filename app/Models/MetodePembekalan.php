<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembekalan extends Model
{
    use HasFactory;
    protected $table = 'metode_pembekalan';

    public function pembekalan()
    {
        return $this->hasMany(Pembekalan::class, 'metode_id', 'id');
    }
}
