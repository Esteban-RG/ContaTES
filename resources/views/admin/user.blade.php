<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Administrar usuarios</h1>
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

    <x-input-error class="mt-2" :messages="$errors->get('name')" />

    <x-input-error class="mt-2" :messages="$errors->get('email')" />

    <x-input-error class="mt-2" :messages="$errors->get('password')" />

    <div class="new align-items-center " style="display:none;">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-user-create')}}" method="post">
                    @csrf

                    <div class=" mt-6 space-y-6 p-4 ">
                        
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"  required autofocus autocomplete="name" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"  required autofocus autocomplete="email" />
                        </div>
                        <div class="form-group mt-3">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"  required autofocus  />
                        </div>
            
                        <div class="form-group mt-3">
                            <x-input-label for="password_confirmation" :value="__('Password Confirmation')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full"  required autofocus  />
                        </div>

                        <div>
                            <x-input-label for="role" :value="__('Rol')" />
                            <div>
                                <input class="form-check-input" type="radio" name="role" id="user" value="user" checked >
                                <label class="form-check-label" for="user">    
                                Usuario
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="admin" value="admin" >
                                <label class="form-check-label" for="admin">
                                Administrador
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
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col" colspan=2>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>                        
                        <a href="{{ route('admin-user-edit',  $user->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        
                        <form action="{{ route('admin-user-destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
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