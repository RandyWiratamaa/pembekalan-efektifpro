<?php

namespace App\Imports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;

class PesertaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    public function model(array $row)
    {
        return new Peserta([
            'nama' => $row[1],
            'nohp' => $row[2],
            'email_kantor' => $row[3],
            'pembekalan_uuid' => $this->uuid,
        ]);
    }
}
