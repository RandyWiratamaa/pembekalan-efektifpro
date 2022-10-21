<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPembekalan extends Model
{
    use HasFactory;
    protected $table = 'level_pembekalan';

    public function pembekalan()
    {
        return $this->hasMany(Pembekalan::class, 'level_id', 'id');
    }
}
