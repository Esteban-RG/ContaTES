<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Administrar vacaciones</h1>
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

    <x-input-error class="mt-2" :messages="$errors->get('dia_no_laboral')" />

    <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />

    <div class="new align-items-center " style="display:none;">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-vacaciones-create')}}" method="post">
                    @csrf

                    <div class=" mt-6 space-y-6 p-4 ">
                        
                        <div>
                            <x-input-label for="dia_no_laboral" :value="__('Dia no laboral')" />
                            <x-text-input id="dia_no_laboral" name="dia_no_laboral" type="date" class="mt-1 block w-full"  required autofocus />
                        </div>

                        <div>
                            <x-input-label for="descripcion" :value="__('Descripción')" />
                            <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full"  required autofocus />
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
                <th scope="col">Dia</th>
                <th scope="col">Descripción</th>
                <th scope="col" colspan=2>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vacaciones as $vacaciones)
                <tr>
                    <td>{{ $vacaciones->id }}</td>
                    <td>{{ $vacaciones->dia_no_laboral }}</td>
                    <td>{{ $vacaciones->descripcion }}</td>
                    <td>                        
                        <a href="{{ route('admin-vacaciones-edit',  $vacaciones->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    
                    <td>
                        
                        <form action="{{ route('admin-vacaciones-destroy', $vacaciones->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este dia?');">
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