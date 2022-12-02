<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInvoice extends Model
{
    use HasFactory;
    protected $table = 'detail_invoice';
    protected $dates = ['tgl_invoice', 'jatuh_tempos'];

}
