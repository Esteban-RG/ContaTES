<div>
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sidebar h-100">
        <a href="/" class="logo d-flex align-items-center" >
            <img src="{{ asset('img/logo.png') }}" alt="" style="max-height: 70px; margin-right: 8px;">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route ('dashboard')}}" class="nav-link text-white {{ Route::is('dashboard') ? 'active' : '' }}" aria-current="page">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route ('admin-user')}}" class="nav-link text-white {{ Route::is('admin-user') ? 'active' : '' }}">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                    Usuarios
                </a>
            </li>
            <li>
                <a href="{{ route ('admin-empleado')}}" class="nav-link text-white {{ Route::is('admin-empleado') ? 'active' : '' }}">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                    Empleados
                </a>
            </li>
            <li>
                <a href="{{ route ('admin-plaza')}}" class="nav-link text-white {{ Route::is('admin-plaza') ? 'active' : '' }}">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                    Plazas
                </a>
            </li>
            <li>
                <a href="{{ route ('admin-vacaciones')}}" class="nav-link text-white {{ Route::is('admin-vacaciones') ? 'active' : '' }}">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                    Vacaciones
                </a>
            </li>
            <li>
                <a href="{{ route ('admin-bono')}}" class="nav-link text-white {{ Route::is('admin-bono') ? 'active' : '' }}">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                    Bonos
                </a>
            </li>
            
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="{{ route('profile.edit')}}">Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class=" dropdown-item"> Cerrar Sesión </button>
                </form>
            </ul>
        </div>
    </div>
</div>