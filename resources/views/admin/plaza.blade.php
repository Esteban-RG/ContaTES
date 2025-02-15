<x-layout-admin title="Panel de administracion de plazas">
    <div class="m-3">
        <h1>Administrar plazas</h1>
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

    <x-input-error class="mt-2" :messages="$errors->get('nombre')" />

    <x-input-error class="mt-2" :messages="$errors->get('email')" />

    <x-input-error class="mt-2" :messages="$errors->get('password')" />

    <div class="new align-items-center " style="display:none;">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-plaza-create')}}" method="post">
                    @csrf

                    <div class=" mt-6 space-y-6 p-4 ">
                        
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full"  required autofocus />
                        </div>

                        <div>
                            <x-input-label for="sueldo" :value="__('Sueldo')" />
                            <x-text-input id="sueldo" name="sueldo" type="numeric" class="mt-1 block w-full"  required autofocus />
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
                <th scope="col">Sueldo</th>
                <th scope="col" colspan=2>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plazas as $plaza)
                <tr>
                    <td>{{ $plaza->id }}</td>
                    <td>{{ $plaza->nombre }}</td>
                    <td>{{ $plaza->sueldo }}</td>
                    <td>                        
                        <a href="{{ route('admin-plaza-edit',  $plaza->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    
                    <td>
                        
                        <form action="{{ route('admin-plaza-destroy', $plaza->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta plaza?');">
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