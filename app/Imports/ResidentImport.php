<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ResidentImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Resident([
            'nik' => $row[1],
            'name' => $row[2], 
            'tempat_lahir' => $row[3], 
            'tanggal_lahir' => $row[4], 
            'gender' => $row[5], 
            'desa' => $row[6],
            'rt' => $row[7], 
            'rw' => $row[8], 
            'religion' => $row[9], 
            'status_perkawinan' => $row[10], 
            'pekerjaan' => $row[11]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
