@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Pacientes</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/Paciente/create')}}" class="btn btn-sm btn-primary">Nuevo Paciente</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('msg'))
            <div class="alert alert-success" role="alert">
                <i class="ni ni-bell-55"></i> &nbsp {{session('msg')}}
            </div>
            @endif
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Opciones</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">D.N.I</th>
                    <th scope="col">Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pacientes as $d)
                <tr>
                    <td>
                        <form action="{{url('Paciente/'.$d->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('Paciente/'.$d->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        {{$d->name}}
                    </td>
                    <td>
                        {{$d->email}}
                    </td>
                    <td>
                        {{$d->dni}}
                    </td>
                    <td>
                        <i class="fas fa-arrow-up text-success mr-3"></i>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body">
            {{$pacientes->links()}}
        </div>
    </div>
@endsection
