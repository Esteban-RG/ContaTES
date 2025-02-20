<x-layout title="Bienvenido">
    <section id="about" class="about section">

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 40
              },
              "1200": {
                "slidesPerView": 1,
                "spaceBetween": 1
              }
            }
          }
        </script>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('img/img_h_6.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('img/img_h_7.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('img/img_h_8.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                    <h1 class="mb-4" data-aos="fade-up">
                        Sistema Integral de Gestión de Nóminas del TESCHI
                    </h1>
                    <p data-aos="fade-up">
                        Facilita la gestión y reduce la carga administrativa y minimizar errores en el procesamiento
                        de nominas
                    </p>
                    <p class="mt-5" data-aos="fade-up">
                        <a href="{{ url ('home')}}" class="btn btn-get-started">Acceso</a>
                    </p>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">
        <div class="text-center">
            <h1>Sistema Automatizado</h1>
            <p>Ahora todo es mas facil</p>
        </div>

        <div class="container">
            <div class="row gy-4 justify-content-center">

                <div class="col-lg-3">
                    <div class="services-item text-center" data-aos="fade-up">
                        <div class="services-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <div>
                            <h3>Gestión de Nóminas</h3>
                            <p>Calculo automatico, Gestión de deducciones fiscales y Generación de recibos de pago</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="services-item text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="services-icon">
                            <i class="bi bi-command"></i>
                        </div>
                        <div>
                            <h3>Herramientas de Reportes y Analisis</h3>
                            <p>Generación de reportes financieros, Analisis de productividad y rendimiento</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="services-item text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="services-icon">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <div>
                            <h3>Gestión de Empleados</h3>
                            <p>Registro y actualización de datos, Historial de Nomina del Empleado. Acceso a
                                información sobre beneficios</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- /Services Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

        <div class="container">

            <div class="row gy-4 justify-content-center">

                <div class="col-lg-5">
                    <div class="images-overlap">
                        <img src="{{ asset('img/blog-3.jpg') }}" alt="student" class="img-fluid img-1"
                            data-aos="fade-up">
                    </div>
                </div>

                <div class="col-lg-4 ps-lg-5">
                    <h1 class="content-title">ACCESO SEGURO Y PERSONALIZADO</h1>
                    <p class="mb-5">
                        <b>Acceso controlado basado en roles</b>: Los Administradores, empleados y supervisores
                    </p>

                    <p class="mb-5">
                        Los empleados pueden acceder solo a sus datos, mientras que los administradores tienen un
                        acceso completo.
                    </p>

                    <p class="mb-5">
                        <b>Autenticación de multiples factores</b>: Medidas avanzadas de seguridad como la
                        auntenticacion de dos factores (2FA) para poder proteger la informacion confidencial
                    </p>
                </div>

            </div>

        </div>
    </section><!-- /Stats Section -->


    <!-- Services 2 Section -->
    <section id="services-2" class="services-2 section">

        <div class="text-center">
            <h1>Movilidad y Acceso Remoto</h1>
            <p>Acceso Movil y Gestión remota de la nomina</p>
        </div>

        <div class="container">
            <div class="row justify-content-center text-center" data-aos="fade-up">
                <div class="col-md-6 col-lg-12 ps-lg-5">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="services-item" data-aos="fade-up" data-aos-delay="">
                                <div class="services-icon">
                                    <i class="bi bi-search"></i>
                                </div>
                                <div>
                                    <h3>Version Web</h3>
                                    <p>Podran acceder desde cualquier dispositivo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="services-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="services-icon">
                                    <i class="bi bi-command"></i>
                                </div>
                                <div>
                                    <h3>Administración</h3>
                                    <p>Los responsables de nomina pueden realizar tareas de administración</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Services 2 Section -->


    <!-- About 2 Section -->
    <section id="about-2" class="about-2 section light-background">

        <div class="container">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 order-lg-2 offset-xl-1 mb-4">
                        <div class="img-wrap text-center text-md-left" data-aos="fade-up" data-aos-delay="100">
                            <div class="img">
                                <img src="{{ asset('img/img_v_3.jpg') }}" alt="circle image" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-5 col-lg-5 col-xl-4" data-aos="fade-up">
                        <div class="px-3">
                            <h2 class="content-title text-start">
                                Personalización y Escalabilidad
                            </h2>
                            <p class="mb-5">
                                Configuración de politicas salariales: Adaptacion del sistema a las politicas y
                                procedimientos especificos de la universidad
                            </p>
                            <p class="mb-5">
                                Escalabilidad: Capacidad para crecer con la universidad, añadiendo nuevos empleados,
                                facultades o departamentos de manera flexible.
                            </p>
                            <p class="mb-5">
                                Cuadros de mando en tiempo real: Vision clara y concisa de las estadisticas
                            </p>
                            <p>
                                <a href="{{ url('/terms') }}" class="btn-get-started">Cumplimiento Legal y Normativo</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About 2 Section -->
</x-layout>