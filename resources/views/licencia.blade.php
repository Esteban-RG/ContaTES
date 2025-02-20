<x-layout title="Nomina">
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    
                    
                    
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Gestión de vacaciones y licencias
                                </h2>
                            </header>       
                            <div class="d-flex flex-row-reverse mb-3">
                                <a href="{{ route('show-permiso') }}" class="btn btn-success"> Solicitar un permiso </a>
                            </div>

                            <img src="{{ asset('img/calendario.jpg') }}" alt="" class="img-fluid">

                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>