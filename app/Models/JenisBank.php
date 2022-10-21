<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisBank extends Model
{
    use HasFactory;
    protected $table = 'jenis_bank';

    public function bank()
    {
        return $this->hasMany(Bank::class, 'jenis_id', 'id');
    }
}
