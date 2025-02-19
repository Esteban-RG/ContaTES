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
                        @if($empleado->curp != null)
                        <p class="mb-2"><strong>CURP:</strong> <a href="{{ asset('storage/'.$empleado->curp) }}" class="text-decoration-none" target="_blank">Ver CURP</a></p>
                        @endif
                        @if($empleado->nss != null)
                        <p class="mb-2"><strong>NSS:</strong> <a href="{{ asset('storage/'.$empleado->nss) }}" class="text-decoration-none" target="_blank">Ver NSS</a></p>
                        @endif
                        @if($empleado->rfc != null)
                        <p class="mb-2"><strong>RFC:</strong> <a href="{{ asset('storage/'.$empleado->rfc) }}" class="text-decoration-none" target="_blank">Ver RFC</a></p>
                        @endif
                    </div>
                </div>
            </div>

            <a href="{{ route('empleado-show-nomina',$empleado->id) }}" class="btn btn-success"> Historial de nomina </a>

            <div>
                <h2 class="h4 text-primary mb-3 mt-3"> Bonos asignados</h2>
                
                <form action="{{ route('empleado-assign-bono', $empleado->id)}}" method="POST">
                    @csrf
                    <div class="row align-items-center"> 
                        <div class="col-10">
                            <label for="dynamicCombobox" class="form-label">Selecciona bono</label>
                            <select class="form-select" id="bono_id" name="bono_id">
                                <option selected>Selecciona bono</option>
                                @foreach($bonos_disponibles as $bono)
                                    <option value="{{ $bono->id }}">{{ $bono->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2 d-flex align-items-end"> 
                            <button class="btn btn-success mt-4">Asignar</button>
                        </div>
                    </div>
                </form>

                

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Bono</th>
                            <th scope="col" >Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleado->bonos as $bono) 
                            <tr>
                                <td>{{ $bono->descripcion }}</td>
                                
                                
                                <td>
                                    
                                    <form action="{{ route('empleado-remove-bono', [$empleado->id , $bono->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este bono?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            
        </div>
        
    </div>

</x-layout-admin>