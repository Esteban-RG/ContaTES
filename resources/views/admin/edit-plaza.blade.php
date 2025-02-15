<x-layout-admin title="Panel de administracion de usuarios">
    <div class="m-3">
        <h1>Administrar Usuarios</h1>
    </div>
    
    <div class="d-flex  mb-3">
        <a href="{{route ('admin-plaza')}}" class="btn btn-success" >Volver</a>
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


    <div class="new align-items-center ">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-plaza-update' , $plaza->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class=" mt-6 space-y-6 p-4 ">
                        
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" value="{{$plaza->nombre}}" required autofocus="nombre" />
                        </div>

                        <div>
                            <x-input-label for="sueldo" :value="__('Sueldo')" />
                            <x-text-input id="sueldo" name="sueldo" type="numeric" class="mt-1 block w-full"  value="{{$plaza->sueldo}}" required autofocus />
                        </div>
                                            
                        <div class="text-center mt-3"><button class="btn btn-success w-100" type="submit">Guardar</button></div>
                        

                        

                    </div>
                </form>
            </div>
        </div>
        
    </div>

</x-layout-admin>