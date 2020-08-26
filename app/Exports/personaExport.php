<?php

namespace App\Exports;

use App\persona;
use Maatwebsite\Excel\Concerns\FromCollection;

class personaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return persona::select('cedula','nombre','apellido','estado','unidad','votacion')->get();
    }

   
}
