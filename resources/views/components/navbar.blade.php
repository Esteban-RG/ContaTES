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
            <li><a href="{{ url('/contact') }}" class="{{ Request::is('/contact') ? 'active' : '' }}">Atencion y Soporte</a></li>
            
            @if(Request::is('login'))
                <li><a href="{{ url('/register') }}" class="active" >Registro</a></li>
            @else
                <li><a href="{{ url('/home') }}" class="active" >Acceso</a></li>
            @endif

            @auth            
            
            @if( Auth::user()->name == 'admin'   )
            <li><a href="{{ url('/admin') }}" class="{{ Request::is('/admin') ? 'active' : '' }}">Admin</a></li>
            @endif

            <li> 
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle m-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}  
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('profile.edit')}}">Perfil</a></li>
                </ul>
              </div>
            </li>

            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Salir</button>
              </form>
            </li>

            

             
            @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    </div>
  </header>