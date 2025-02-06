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
                <li><a href="{{ url('/login') }}" class="active" >Acceso</a></li>
            @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    </div>
  </header>