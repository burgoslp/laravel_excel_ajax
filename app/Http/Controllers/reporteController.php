<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\personaExport;
use App\Imports\personaImport;
use App\persona;


class reporteController extends Controller
{
    

    public function reportePersona(){

    	return Excel::download(new personaExport, 'respaldo.xlsx');
    }

    public function importPersonas(Request $request){

    	$persona=persona::truncate(); 

    	$path1 = $request->file('file')->store('temp'); 
		$path=storage_path('app').'/'.$path1;  
		$data = \Excel::import(new personaImport,$path);


    	return response()->json(['msj' => 'Registros importados']);
    }
}
