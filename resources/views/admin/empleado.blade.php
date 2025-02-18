<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Administrar empleados</h1>
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

    <x-input-error class="mt-2" :messages="$errors->get('user_id')" />

    <x-input-error class="mt-2" :messages="$errors->get('plaza_id')" />

    <x-input-error class="mt-2" :messages="$errors->get('matricula')" />

    <x-input-error class="mt-2" :messages="$errors->get('fecha_ingreso')" />


    <div class="new align-items-center " style="display:none;">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-empleado-create')}}" method="post">
                    @csrf

                    <div class=" mt-6 space-y-6 p-4 ">

                        <div>
                            <label for="dynamicCombobox" class="form-label">Selecciona usuario</label>
                            <select class="form-select" id="user_id" name="user_id">
                                <option selected>Selecciona usuario</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ isset($user->persona->nombre) ? $user->persona->ap_paterno." ".$user->persona->ap_materno." ".$user->persona->nombre :$user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label for="dynamicCombobox" class="form-label">Selecciona plaza</label>
                            <select class="form-select" id="plaza_id" name="plaza_id">
                                <option selected>Selecciona plaza</option>
                                @foreach($plazas as $plaza)
                                    <option value="{{ $plaza->id }}">{{ $plaza->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="matricula" :value="__('Matricula')" />
                            <x-text-input id="matricula" name="matricula" type="number" class="mt-1 block w-full"  required autofocus />
                        </div>

                        <div>
                            <x-input-label for="fecha_ingreso" :value="__('Fecha de ingreso')" />
                            <x-text-input id="fecha_ingreso" name="fecha_ingreso" type="date" class="mt-1 block w-full"  required autofocus />
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
                <th scope="col">Ingreso</th>
                <th scope="col">Matricula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Plaza</th>
                <th scope="col" colspan=3>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->fecha_ingreso }}</td>
                    <td>{{ $empleado->matricula }}</td>
                    <td>{{ $empleado->persona->nombre." ".$empleado->persona->ap_paterno." ".$empleado->persona->ap_materno }}</td>
                    <td>{{ $empleado->plaza->nombre }}</td>
                    <td>                        
                        <a href="{{ route('admin-empleado-details',  $empleado->id) }}" class="btn btn-secondary">Detalles</a>
                    </td>
                    <td>                        
                        <a href="{{ route('admin-empleado-edit',  $empleado->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    
                    <td>
                        
                        <form action="{{ route('admin-empleado-destroy', $empleado->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta empleado?');">
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