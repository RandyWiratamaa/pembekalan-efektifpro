<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    protected $date = 'tanggal';

    protected $fillable = [
        'pembekalan_uuid', 'tanggal'
    ];

    public function pembekalan()
    {
        return $this->belongsTo(Pembekalan::class, 'pembekalan_uuid', 'uuid');
    }
}
