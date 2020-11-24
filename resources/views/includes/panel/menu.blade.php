<!-- Navigation -->
<!-- Heading -->

<h6 class="navbar-heading text-muted">
    @if(auth()->user()->role == 'admin')
    Gestionar datos
    @else
    Menu Principal
    @endif
</h6>
<ul class="navbar-nav">
    @if(auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('especialidad')}}">
            <i class="ni ni-planet text-blue"></i> Especialidades
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('Doctor')}}">
            <i class="ni ni-pin-3 text-orange"></i> Medicos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('Paciente')}}">
            <i class="ni ni-single-02 text-yellow"></i> Pacientes
        </a>
    </li>
    @elseif(auth()->user()->role == 'doctor')
        <li class="nav-item">
            <a class="nav-link" href="{{url('programacion')}}">
                <i class="ni ni-calendar-grid-58 text-danger"></i> Gestionar Horario
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ni ni-time-alarm text-primary"></i> Mis Citas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ni ni-satisfied text-info"></i> Mis Pacientes
            </a>
        </li>
        @else {{--Paciente--}}
            <li class="nav-item">
                <a class="nav-link" href="/home">
                    <i class="ni ni-calendar-grid-58 text-danger"></i> Reservar Cita
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="ni ni-time-alarm text-primary"></i> Mis Citas
                </a>
            </li>
    @endif
</ul>
<hr class="my-3">
<h6 class="navbar-heading text-muted">Opciones</h6>
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('frmLogout').submit();">
            <i class="ni ni-key-25 text-info"></i> Cerrar Sesion
        </a>
        <form id="frmLogout" action="{{route('logout')}}" method="post" style="display: none;">@csrf</form>
    </li>
</ul>

@if(auth()->user()->role == 'admin')
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-sound-wave text-yellow"></i> Frecuencia de Citas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-spaceship text-orange"></i> Productividad Medicos
        </a>
    </li>
</ul>
@endif
