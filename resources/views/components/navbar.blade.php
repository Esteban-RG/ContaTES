<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url ('/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo.png') }}" alt="">
        <h1 class="sitename">ContaTES</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Inicio</a></li>
            <li><a href="https://www.teschi.edu.mx">Comunidad</a></li>
            <li><a href="{{ url('/contact') }}">Atencion y Soporte</a></li>
            
            @if(Request::is('login'))
                <li><a href="{{ url('/register') }}" class="active" >Registro</a></li>
            @else
                <li><a href="{{ url('/home') }}" class="active" >Acceso</a></li>
            @endif

            @auth            
                            
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                  {{ Auth::user()->name }}  
                </button>
                <form action="{{ route('logout') }}" method="POST" class="dropdown-menu p-5">
                  @csrf
                  <button type="submit" class="btn btn-danger">Salir</button>
                </form>
              </div>
            @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    </div>
  </header>