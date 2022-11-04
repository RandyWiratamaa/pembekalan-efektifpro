<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;
    protected $table = 'pengajar';
    protected $fillable = [
        'nama', 'jenkel'
    ];

    public function pembekalan()
    {
        return $this->hasMany(Pembekalan::class, 'pengajar_id', 'id');
    }
}
