<x-layout title="Registrar">
  <section id="about" class="about section">
    <div class="container" data-aos="fade">

        <div class="col-lg-12">
          <div class="text-center">
            <a href="index.html" class="logo">
              <img src="assets/img/logo.png" alt="">
            </a>

            <h1 class="mt-3">Registro</h1>
          </div>


          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="d-flex justify-content-center align-items-center">
              <div class="col-md-6 col-10 p-4">
                <div class="form-group" >
                  <input type="text" name="name" class="form-control" id="name" placeholder="Usuario" required="">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
    
                <div class="form-group mt-3" >
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                <div class="form-group mt-3">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required="">
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
    
                <div class="form-group mt-3">
                  <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmar contraseña" required="">
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                
                                    
                <div class="text-center mt-3"><button class="btn btn-get-started w-100" type="submit">Registrar</button></div>
              
              </div>
            </div>
            
           
            
          </form>
        </div><!-- End Login Form -->

      </div>

    </div>
</section><!-- /About 2 Section -->
</x-layout>