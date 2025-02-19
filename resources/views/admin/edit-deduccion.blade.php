<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Administrar deduccion</h1>
    </div>
    
    <div class="d-flex  mb-3">
        <a href="{{route ('admin-deduccion')}}" class="btn btn-success" >Volver</a>
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


    <div class="new align-items-center ">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-deduccion-update' , $deduccion->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class=" mt-6 space-y-6 p-4 ">

                        <div>
                            <x-input-label for="descripcion" :value="__('Descripción')" />
                            <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" value="{{$deduccion->descripcion}}" required autofocus />
                        </div>

                        <div>
                            <x-input-label for="valor" :value="__('Valor')" />
                            <x-text-input id="valoe" name="valor" type="number" class="mt-1 block w-full" value="{{$deduccion->valor}}" required autofocus />
                        </div>
                                            

                        <div>
                            <x-input-label for="role" :value="__('Tipo')" />
                            <div>
                                <input class="form-check-input" type="radio" name="tipo" id="porcentual" value="porcentual" {{ $deduccion->tipo == 'porcentual' ? 'checked' : '' }} >
                                <label class="form-check-label" for="porcentual">    
                                Porcentual
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" id="fijo" value="fijo" {{ $deduccion->tipo == 'fijo' ? 'checked' : '' }} >
                                <label class="form-check-label" for="fijo">
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

</x-layout-admin>