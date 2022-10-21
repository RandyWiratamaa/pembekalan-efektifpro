<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;
    protected $table = 'jenis_surat';
    protected $dates = 'created_at';
    protected $fillable = 'jenis';

    public function surat()
    {
        return $this->hasMany('App\Models\Surat', 'jenis_id', 'id');
    }
}
