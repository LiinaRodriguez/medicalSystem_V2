
<h6 class="navbar-heading text-muted">
  @if(auth()->user()->role == 'admin')  
    Gestión
  @else 
    Menú
  @endif
</h6>

<ul class="navbar-nav">

      @if(auth()->user()->role == 'admin')
          <li class="nav-item  active ">
            <a class="nav-link  active " href="./home">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('/especialidades') }}">
              <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('/centros')}}">
              <i class="ni ni-pin-3 text-orange"></i> Centros médicos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/medicos')}}">
              <i class="fas fa-stethoscope text-blue"></i>  Médicos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/pacientes')}}">
              <i class="fas fa-bed text-red"></i> Pacientes
            </a>
          </li>
        @elseif(auth()->user()->role == 'medico')
        <li class="nav-item">
            <a class="nav-link " href="{{url('/horario')}}">
              <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar horario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="far fa-clock text-info"></i> Mis Citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="fas fa-bed text-red"></i> Mis pacientes
            </a>
          </li>

        @else
        <li class="nav-item">
            <a class="nav-link " href="">
              <i class="ni ni-calendar-grid-58 text-primary"></i> Reservar cita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="far fa-clock text-info"></i> Mis Citas
            </a>
          </li>

      @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('formlogout').submit(); ">
            <i class="fas fa-sign-in-alt text-blue"></i> Cerrar Sesión
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formlogout"> @csrf </form>
            
          </li> 
        </ul>
        
    @if(auth()->user()->role == 'admin')
        <!-- Divider -->
        <hr class="my-3">

        <!-- Heading -->

    <h6 class="navbar-heading text-muted">Reportes</h6>

    <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="ni ni-books text-default"></i> Citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="ni ni-chart-bar-32 text-blue"></i> Rendimiento
            </a>
          </li>
        </ul>

    @endif
     