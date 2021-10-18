<?php

namespace App\Exports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResidentExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings() : array
    {
        return [
            '#',
            'nik',
            'name', 
            'tempat_lahir', 
            'tanggal_lahir', 
            'gender', 
            'desa', 
            'rt', 
            'rw', 
            'religion', 
            'status_perkawinan', 
            'pekerjaan'
        ];
    }
}
