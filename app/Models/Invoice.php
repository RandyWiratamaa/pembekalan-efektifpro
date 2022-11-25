<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $date = 'tanggal';
    protected $fillable = [
        'pembekalan_uuid', 'no_invoice', 'perihal', 'body',
    ];

    public function bpo()
    {
        return $this->belongsTo(Bpo::class, 'approved_by', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
}
