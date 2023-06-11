<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function generarPdf(Request $request)
    {
        /* $profesor = 'Aquino Segura Roldan';
        $rol = 'JEFE DEL DEPARTAMENTO DE ACTIVIDADES';
        $ambito = 'EXTRAESCOLARES'; */
        $data = [
            'num_control'=>$request->numero_control,
            'anio_actual'=> date('Y'),
            'nombre' =>$request->nombre,
            'actividad' =>$request->actividad,
            'fecha' => date('Y-m-d'),
            'horas' => date('H'),
            'credito' => 'Civico',
            'carrera' => $request->carrera,
            'profesor' => ' ing. Aquino Segura Roldan',
            'rol' => 'JEFE DEL DEPARTAMENTO DE ACTIVIDADES',
            'ambito' => 'EXTRAESCOLARES',
            'firma' => '________________________________'
        ];
        $pdf = PDF::loadView('pdf', $data);
        // compact('profesor', 'rol', 'ambito')

        return $pdf->stream('ejemplo.pdf');
    }
}
