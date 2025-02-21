<x-layout-admin title="Panel de administracion">
                    
        
    <div class="m-3">
        <h1>Historial de nomina</h1>
    </div>    
                
    <div class="d-flex  mb-3">
        <a href="{{route ('admin-empleado-details',$empleado->id)}}" class="btn btn-success" >Volver</a>
    </div>

    <div class="d-flex flex-row-reverse mb-3">
        <a href="{{ route('nomina-export', $empleado->matricula) }}" class="btn btn-primary m-3">Descargar historial</a>
        <button class="btn btn-success m-3" onclick="mostrarFormulario()">Generar nomina </button>

    </div>
            

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-input-error class="mt-2" :messages="$errors->get('fecha_inicio')" />

    <x-input-error class="mt-2" :messages="$errors->get('fecha_fin')" />




    <div class="new align-items-center " style="display:none;">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route('create-nomina', $empleado->id) }}" method="post">
                    @csrf

                    <div class=" mt-6 space-y-6 p-4 ">

                       

                        <div>
                            <x-input-label for="fecha_ingreso" :value="__('Fecha inicio')" />
                            <x-text-input id="fecha_ingreso" name="fecha_inicio" type="date" class="mt-1 block w-full"  required autofocus />
                        </div>


                        <div>
                            <x-input-label for="fecha_ingreso" :value="__('Fecha fin')" />
                            <x-text-input id="fecha_ingreso" name="fecha_fin" type="date" class="mt-1 block w-full"  required autofocus />
                        </div>

                        
                        
                                            
                        <div class="text-center mt-3"><button class="btn btn-success w-100" type="submit">Generar</button></div>
                        

                        

                    </div>
                </form>
            </div>
        </div>
        
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Inicio</th>
                <th scope="col">Final</th>
                <th scope="col" >Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nominas as $nomina)
                <tr>
                    <td>{{ $nomina->fecha_inicio }}</td>
                    <td>{{ $nomina->fecha_fin }}</td>
                    <td>                        
                        <a href="{{ route('details-nomina',  $nomina->id) }}" class="btn btn-secondary" target="_blank">Details</a>
                    </td>
                
                </tr>
            @endforeach
        </tbody>
    </table>


</x-layout-admin>