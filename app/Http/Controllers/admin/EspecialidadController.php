<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Especialidad;
use App\Http\Controllers\Controller;
class EspecialidadController extends Controller
{

    private function Validacion(Request $request)
    {
        $rules=[
            'nombre' =>'required|min:4|unique:tbl_especialidad,nombre',
            'descripcion' =>'required|min:4'
        ];
        $messages=[
            'nombre.required' => 'Es necesario ingresar una especialidad',
            'nombre.min' => 'La especialidad debe tener 4 caracteres como minimo',
            'descripcion.required' => 'Es necesario ingresar una descripcion',
            'descripcion.min' => 'La descripcion debe tener 4 caracteres como minimo'
        ];
        $this->validate($request,$rules,$messages);
    }

    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.index',compact('especialidades'));
    }
    public function create()
    {
        return view('especialidades.create');
    }
    public function store(Request $request)
    {
        $this->validacion($request);
        $especialidad = new Especialidad();
        $especialidad->nombre = $request->input('nombre');
        $especialidad->descripcion = $request->input('descripcion');
        $especialidad->save();

        $msg = 'La Especialidad se ha registrado Correctamente';
        return redirect('especialidad')->with(compact('msg'));
    }
    public function edit(Especialidad $especialidad)
    {
        return view('especialidades.edit',compact('especialidad'));
    }
    public function update(Request $request, Especialidad $especialidad)
    {
        $this->validacion($request);
        $especialidad->nombre = $request->input('nombre');
        $especialidad->descripcion = $request->input('descripcion');
        $especialidad->save();

        $msg = 'La Especialidad se ha actualizado Correctamente';
        return redirect('especialidad')->with(compact('msg'));
    }
    public function destroy(Especialidad $especialidad)
    {
        $EspecialidadEliminada = $especialidad->nombre;
        $especialidad->delete();

        $msg = 'La especialidad '.$EspecialidadEliminada.' Elimino correctamente';
        return redirect('especialidad')->with(compact('msg'));
    }
}
