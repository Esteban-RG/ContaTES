<x-layout title="Home">

    <div class="page-title light-background">
      <div class="container text-center">
          <p>Autenticacion por dos pasos con Google Authenticator activada</p>
          <p>Visita tu perfil para conocer tu clave</p>

      </div>
    </div>
     <!-- Services 2 Section -->
     <section id="services-2" class="services-2 section">

        <div class="container">
          <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-12 text-center">
              <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                  <a href="{{ route('profile.edit')}}">
                    <div class="services-item" data-aos="fade-up" data-aos-delay="100">
                      <div class="services-icon">
                        <i class="bi bi-person"></i>
                      </div>
                      <div>
                        <h3>PERFIL</h3>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                  <a href="{{ route('terminos') }}">
                    <div class="services-item" data-aos="fade-up" data-aos-delay="200">
                      <div class="services-icon">
                        <i class="bi bi-shield-check"></i>
                      </div>
                      <div>
                        <h3>CUMPLIMIENTO LEGAL Y NORMATIVO</h3>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                  <a href="{{ route('contact') }}">
                    <div class="services-item" data-aos="fade-up" data-aos-delay="300">
                      <div class="services-icon">
                        <i class="bi bi-envelope"></i>
                      </div>
                      <div>
                        <h3>ATENCION Y SOPORTE</h3>
                      </div>
                    </div>
                  </a>
                </div>


                
                
              </div>

              @if($user->persona && $user->persona->empleado)
              <div class="row mt-5" >
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                  <a href="{{ route('show_licencia') }}">
                    <div class="services-item" data-aos="fade-up" data-aos-delay="400">
                      <div class="services-icon">
                        <i class="bi bi-globe"></i>
                      </div>
                      <div>
                        <h3>GESTION VACACIONES Y LICENCIAS</h3>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                  <a href="{{ route('show_nomina') }}">
                    <div class="services-item" data-aos="fade-up" data-aos-delay="500">
                      <div class="services-icon">
                        <i class="bi bi-cash-stack"></i>
                      </div>
                      <div>
                        <h3>NOMINA</h3>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                  <a href="{{ route("show-expediente") }}">
                    <div class="services-item" data-aos="fade-up" data-aos-delay="600">
                      <div class="services-icon">
                        <i class="bi bi-grid"></i>
                      </div>
                      <div>
                        <h3>EXPEDIENTE</h3>
                      </div>
                    </div>
                  </a>
                </div>
                
              </div> 
              @endif
              
             
  
            </div>
          </div>
          
        </div>
      </section><!-- /Services 2 Section -->
  
</x-layout>