<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Administrar deducciones globales</h1>
    </div>
    
    <div class="d-flex flex-row-reverse mb-3">
        <button class="btn btn-success" onclick="mostrarFormulario()">Nuevo</button>
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

    <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />
    <x-input-error class="mt-2" :messages="$errors->get('tipo')" />
    <x-input-error class="mt-2" :messages="$errors->get('valor')" />


    <div class="new align-items-center " style="display:none;">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-deduccion-create')}}" method="post">
                    @csrf

                    <div class=" mt-6 space-y-6 p-4 ">
                        
                        <div>
                            <x-input-label for="descripcion" :value="__('Descripción')" />
                            <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full"  required autofocus />
                        </div>

                        <div>
                            <x-input-label for="valor" :value="__('Valor')" />
                            <x-text-input id="valor" name="valor" type="number" class="mt-1 block w-full"  required autofocus />
                        </div>

                        <div>
                            <x-input-label for="role" :value="__('Tipo')" />
                            <div>
                               <input class="form-check-input" type="radio" name="tipo" id="tipo" value="porcentual" checked >
                                <label class="form-check-label" for="tipo">    
                                Porcentual
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo" value="fijo" >
                                <label class="form-check-label" for="tipo">
                                Fijo
                                </label> 
                            </div>         
                        </div>
                        
                                            
                        <div class="text-center mt-3"><button class="btn btn-success w-100" type="submit">Guardar</button></div>
                        

                        

                    </div>
                </form>
            </div>
        </div>
        
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Valor</th>
                <th scope="col" colspan=2>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deduccions as $deduccion)
                <tr>
                    <td>{{ $deduccion->id }}</td>
                    <td>{{ $deduccion->descripcion }}</td>
                    <td>{{ $deduccion->tipo }}</td>
                    <td>{{ number_format($deduccion->valor, 2, '.', ',') }}</td>
                    <td>                        
                        <a href="{{ route('admin-deduccion-edit',  $deduccion->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    
                    <td>
                        
                        <form action="{{ route('admin-deduccion-destroy', $deduccion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta deduccion?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="m-3">
        <h1>Tarifas ISR Quincenal</h1>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Límite Inferior</th>
                <th scope="col">Límite Superior</th>
                <th scope="col">Cuota Fija</th>
                <th scope="col">Porcentaje Aplicable</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarifas_isr as $tarifa_isr)
                <tr>
                    <td>${{ number_format($tarifa_isr->limite_inferior, 2, '.', ',') }}</td>
                    <td>${{ number_format($tarifa_isr->limite_superior, 2, '.', ',') }}</td>
                    <td>${{ number_format($tarifa_isr->cuota_fija, 2, '.', ',') }}</td>
                    <td>{{ number_format($tarifa_isr->porcentaje_aplicable, 2) }}%</td>
                    <td>                        
                        <a href="{{ route('admin-tarifa-edit', $tarifa_isr->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout-admin>