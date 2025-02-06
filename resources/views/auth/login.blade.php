<x-layout title="Iniciar Sesion">
        <!-- About Section -->
        <section id="about" class="about section">
          <div class="container" data-aos="fade">

              <div class="col-lg-12">
                <div class="text-center">
                  <a href="index.html" class="logo">
                    <img src="assets/img/logo.png" alt="">
                  </a>
    
                  <h1 class="mt-3">Iniciar Sesión</h1>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

    
                <form method="POST" action="{{ route('login') }}">
                  @csrf
              
                  <div class="d-flex justify-content-center align-items-center">

                      <div class="col-md-6 col-10 p-4">
                          <div class="form-group">
                              <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                              <x-input-error :messages="$errors->get('email')" class="mt-2" />
                          </div>
              
                          <div class="form-group mt-3">
                              <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                              <x-input-error :messages="$errors->get('password')" class="mt-2" />
                          </div>
              
                          <div class="form-check mt-3">
                              <input id="remember_me" type="checkbox" name="remember">
                              <label class="form-check-label" for="remember_me">
                                  {{ __('¿Recordar sesión?') }}
                              </label>
                          </div>
              
                          <div class="text-center mt-4">
                              <button class="btn btn-get-started w-100" type="submit">Acceso</button>
                          </div>
              
                          <div class="text-center mt-3">
                              @if (Route::has('password.request'))
                                  <a href="{{ route('password.request') }}">{{ __('¿Olvidaste tu contraseña?') }}</a>
                              @endif
                          </div>
                      </div>
                  </div>
              </form>

              
              </div><!-- End Login Form -->
    
            </div>
    
          </div>
      </section><!-- /About 2 Section -->


</x-layout>