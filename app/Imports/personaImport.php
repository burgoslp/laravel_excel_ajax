<?php

namespace App\Imports;

use App\persona;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class personaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new persona([
          'cedula' => $row['cedula'],
          'nombre' => $row['nombre'],
          'apellido' => $row['apellido'],
          'estado' => $row['estado'],
          'unidad' => $row['unidad'],
          'votacion' => $row['votacion']
        ]);
    }
}
