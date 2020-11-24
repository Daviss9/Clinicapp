<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DiaTrabajo;

class ProgramacionController extends Controller
{
    Public function edit()
    {
        $dias = ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'];
        return view('programacion',compact('dias'));
    }

    public function store(Request $request)
    {
//            dd($request->all());
        $activo = $request->input('activo') ?: [];
        $mañana_inicio = $request->input('mañana_inicio');
        $mañana_fin = $request->input('mañana_fin');
        $tarde_inicio = $request->input('tarde_inicio');
        $tarde_fin = $request->input('tarde_fin');

        for ($i=0;$i<7;++$i)
        DiaTrabajo::updateOrCreate(
            [
                'dia' =>$i,
                'user_id' => auth()->id()
            ],[
                'activo' => in_array($i,$activo),
                'mañana_inicio'=>$mañana_inicio[$i],
                'mañana_fin' =>$mañana_fin[$i],
                'tarde_inicio' =>$tarde_inicio[$i],
                'tarde_fin'=>$tarde_fin[$i]
            ]
        );
        return back();
    }
}
