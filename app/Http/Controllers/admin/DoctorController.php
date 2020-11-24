<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctores = User::Doctores()->get();
        return view('doctores.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctores.create');
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
            +['role' => 'Doctor', 'password' => bcrypt($request->input('password'))]);

        $msg = 'El Doctor se ha registrado correctamente';
        return redirect('/Doctor')->with(compact('msg'));
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
    public function edit($id)
    {
        //Doctores es Scope: filtra solo medicos
        $doctores = User::Doctores()->findOrFail($id);
        return view('doctores.edit', compact('doctores'));
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

        $user = User::Doctores()->findOrFail($id);

        $data = $request->only('name','email','dni','direccion','telefono');
        $password = $request->input('password');
        if ($password)
            $data['password'] = bcrypt($password);
        $user->fill($data);
        $user->save();

        $msg = 'La informacion del Doctor se ha actualizado correctamente';
        return redirect('/Doctor')->with(compact('msg'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $doctorName = $doctor->name;
        $doctor->delete();
        $msg = "El medico $doctorName se ha eliminado correctamente";
        return redirect('/Doctor')->with(compact('msg'));
    }
}
