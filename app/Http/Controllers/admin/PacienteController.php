<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = User::Pacientes()->paginate(10);
        return view('pacientes.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'required|digits:8',
            'direccion' => 'min:5',
            'telefono' => 'digits:9'
        ];
        $this->validate($request,$rules);
        User::create(
            $request->only('name','email','dni','direccion','telefono')
            +['role' => 'Paciente', 'password' => bcrypt($request->input('password'))]);

        $msg = 'El Paciente se ha registrado correctamente';
        return redirect('/Paciente')->with(compact('msg'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $paciente)
    {
        return view('pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'required|digits:8',
            'direccion' => 'min:5',
            'telefono' => 'digits:9'
        ];
        $this->validate($request,$rules);

        $user = User::Pacientes()->findOrFail($id);

        $data = $request->only('name','email','dni','direccion','telefono');
        $password = $request->input('password');
        if ($password)
            $data['password'] = bcrypt($password);
        $user->fill($data);
        $user->save();

        $msg = 'La informacion del Paciente se ha actualizado correctamente';
        return redirect('/Paciente')->with(compact('msg'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $paciente)
    {
        $pacienteName = $paciente->name;
        $paciente->delete();
        $msg = "El Paciente $pacienteName se ha eliminado correctamente";
        return redirect('/Paciente')->with(compact('msg'));
    }
}
