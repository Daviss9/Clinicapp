@extends('layouts.panel')

@section('content')

    <form action="{{url('/programacion')}}" method="post">
        @csrf
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Gestionar Horario</h3>
                    </div>
                    <div class="col text-right">
                        <button type="submit" href="#" class="btn btn-sm btn-success">Guardar Cambios</button>
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
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Turno Mañana</th>
                        <th scope="col">Turno Tarde</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dias as $key => $dia)
                        <tr>
                            <th>{{$dia}}</th>
                            <td>
                                <label class="custom-toggle">
                                    <input type="checkbox" name="activo[]" value="{{$key}}">
                                    <span class="custom-toggle-slider rounded-circle"></span>
                                </label>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
{{--                                        Horas de la mañana--}}
                                        <select class="form-control" name="mañana_inicio[]>
                                            @for($i=5; $i<=11;$i++)
                                                <option value="{{$i}}:00">{{$i}}:00 am</option>
                                                <option value="{{$i}}:30">{{$i}}:30 am</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="mañana_fin[]">
                                            @for($i=5; $i<=11;$i++)
                                                <option value="{{$i}}:00">{{$i}}:00 am</option>
                                                <option value="{{$i}}:30">{{$i}}:30 am</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
{{--                                        Horas de la tarde--}}
                                        <select class="form-control" name="tarde_inicio[]">
                                            @for($i=1; $i<=11;$i++)
                                                <option value="{{$i+12}}:00">{{$i}}:00 pm</option>
                                                <option value="{{$i+12}}:30">{{$i}}:30 pm</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="tarde_fin[]">
                                            @for($i=1; $i<=11;$i++)
                                                <option value="{{$i+12}}:00">{{$i}}:00 pm</option>
                                                <option value="{{$i+12}}:30">{{$i}}:30 pm</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection
