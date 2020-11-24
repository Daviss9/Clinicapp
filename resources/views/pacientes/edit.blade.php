@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Paciente</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/Paciente')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{url('/Paciente/'.$paciente->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Apellidos y Nombres del Paciente</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$paciente->name)}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{old('email',$paciente->email)}}" required>
                </div>
                <div class="form-group">
                    <label for="dni">Numero de D.N.I</label>
                    <input type="text" name="dni" class="form-control" value="{{old('dni',$paciente->dni)}}" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" class="form-control" value="{{old('direccion',$paciente->direccion)}}" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" class="form-control" value="{{old('telefono',$paciente->telefono)}}" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" class="form-control" value="">
                    <p class="small">Ingrese un valor, si desea modificar la contraseña</p>
                </div>
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </form>
        </div>

    </div>
@endsection
