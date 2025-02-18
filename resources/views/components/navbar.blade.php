<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url ('/') }}" class="logo d-flex align-items-center" >
        <img src="{{ asset('img/logo.png') }}" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            
            <li><a href="https://www.teschi.edu.mx">Comunidad</a></li>
            <li><a href="{{ url('/contact') }}" class="{{ Request::is('/contact') ? 'active' : '' }}">Atencion y Soporte</a></li>
            
            @if(Request::is('login'))
                <li><a href="{{ url('/register') }}" class="active" >Registro</a></li>
            @else
                <li><a href="{{ url('/home') }}" class="active" >Acceso</a></li>
            @endif

            @auth            
            
            @if( Auth::user()->role == 'admin'   )
            <li><a href="{{ url('/admin') }}" class="{{ Request::is('/admin') ? 'active' : '' }}">Administrar</a></li>
            @endif
            <li>
              <a href="{{ route('profile.edit')}}" class="link">{{ Auth::user()->name }}</a>
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