<x-layout-admin title="Panel de administracion de usuarios">
    <div class="m-3">
        <h1>Administrar Usuarios</h1>
    </div>
    
    <div class="d-flex  mb-3">
        <a href="{{route ('admin-user')}}" class="btn btn-success" >Volver</a>
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


    <div class="new align-items-center ">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-user-update' , $user->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class=" mt-6 space-y-6 p-4 ">
                        
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{$user->name}}" required autofocus autocomplete="name" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{$user->email}}" required autofocus autocomplete="email" />
                        </div>
                        <div class="form-group mt-3">
                            <x-input-label for="password" :value="__('Nueva contraseña')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"   autofocus  />
                        </div>
            
                        <div class="form-group mt-3">
                            <x-input-label for="password_confirmation" :value="__('Confirmar nueva contraseña')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full"   autofocus  />
                        </div>

                        <div>
                            <x-input-label for="role" :value="__('Rol')" />
                            <div>
                                <input class="form-check-input" type="radio" name="role" id="user" value="user" {{ $user->role == 'user' ? 'checked' : '' }} >
                                <label class="form-check-label" for="user">    
                                Usuario
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="admin" value="admin" {{ $user->role == 'admin' ? 'checked' : '' }} >
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

</x-layout-admin>