<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Detalles del empleado</h1>
    </div>
    
    <div class="d-flex  mb-3">
        <a href="{{route ('admin-empleado')}}" class="btn btn-success" >Volver</a>
    </div>



    <div class="new align-items-center ">

        <div class="card-body">

            <!-- Datos Personales -->
            <div class="mb-5">
                <h2 class="h4 text-primary mb-3">Datos Personales</h2>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-2"><strong>Nombre:</strong> {{ $empleado->persona->nombre }} {{ $empleado->persona->ap_paterno }} {{ $empleado->persona->ap_materno }}</p>
                        <p class="mb-2"><strong>Género:</strong> {{ $empleado->persona->genero == 'M' ? 'Masculino' : 'Femenino' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2"><strong>Correo:</strong> {{ $empleado->persona->user->email }}</p>
                        <p class="mb-2"><strong>Teléfono:</strong> {{ $empleado->persona->telefono }}</p>
                    </div>
                </div>
            </div>
    
            <!-- Datos Laborales -->
            <div class="mb-5">
                <h2 class="h4 text-primary mb-3">Datos Laborales</h2>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-2"><strong>Matrícula:</strong> {{ $empleado->matricula }}</p>
                        <p class="mb-2"><strong>Plaza:</strong> {{ $empleado->plaza->nombre }}</p>
                        <p class="mb-2"><strong>Fecha de Ingreso:</strong> {{ $empleado->fecha_ingreso }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2"><strong>CURP:</strong> <a href="{{ $empleado->curp }}" class="text-decoration-none">Ver CURP</a></p>
                        <p class="mb-2"><strong>RFC:</strong> <a href="{{ $empleado->rfc }}" class="text-decoration-none">Ver RFC</a></p>
                        <p class="mb-2"><strong>NSS:</strong> <a href="{{ $empleado->nss }}" class="text-decoration-none">Ver NSS</a></p>
                    </div>
                </div>
            </div>
    
            
        </div>
        
    </div>

</x-layout-admin>