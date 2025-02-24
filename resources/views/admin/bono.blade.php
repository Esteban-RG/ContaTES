<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Administrar bonos</h1>
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

    <x-input-error class="mt-2" :messages="$errors->get('monto')" />


    <div class="new align-items-center " style="display:none;">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-bono-create')}}" method="post">
                    @csrf

                    <div class=" mt-6 space-y-6 p-4 ">
                        
                        <div>
                            <x-input-label for="descripcion" :value="__('Descripción')" />
                            <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full"  required autofocus />
                        </div>

                        <div>
                            <x-input-label for="monto" :value="__('Monto')" />
                            <x-text-input id="monto" name="monto" type="number" class="mt-1 block w-full"  required autofocus />
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
                <th scope="col">Monto</th>
                <th scope="col" colspan=2>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bonos as $bono)
                <tr>
                    <td>{{ $bono->id }}</td>
                    <td>{{ $bono->descripcion }}</td>
                    <td>${{ number_format($bono->monto, 2, '.', ',') }}</td>
                    <td>                        
                        <a href="{{ route('admin-bono-edit',  $bono->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    
                    <td>
                        
                        <form action="{{ route('admin-bono-destroy', $bono->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta bono?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout-admin>