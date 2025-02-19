<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Administrar tarifa</h1>
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

    <x-input-error class="mt-2" :messages="$errors->get('limite_inferior')" />
    <x-input-error class="mt-2" :messages="$errors->get('limite_superior')" />
    <x-input-error class="mt-2" :messages="$errors->get('cuota_fija')" />
    <x-input-error class="mt-2" :messages="$errors->get('porcentaje_aplicable')" />


    <div class="new align-items-center ">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-tarifa-update' , $isr->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class=" mt-6 space-y-6 p-4 ">

                        <div>
                            <x-input-label for="limite_inferior" :value="__('Limite inferior')" />
                            <x-text-input id="limite_inferior" name="limite_inferior" type="text" class="mt-1 block w-full" value="{{$isr->limite_inferior}}"  autofocus />
                        </div>

                        <div>
                            <x-input-label for="limite_superior" :value="__('Limite superior')" />
                            <x-text-input id="limite_superior" name="limite_superior" type="text" class="mt-1 block w-full" value="{{$isr->limite_superior}}"  autofocus />
                        </div>

                        <div>
                            <x-input-label for="cuota_fija" :value="__('Cuota fija')" />
                            <x-text-input id="cuota_fija" name="cuota_fija" type="text" class="mt-1 block w-full" value="{{$isr->cuota_fija}}"  autofocus />
                        </div>

                        <div>
                            <x-input-label for="porcentaje_aplicable" :value="__('Porcentaje aplicable')" />
                            <x-text-input id="porcentaje_aplicable" name="porcentaje_aplicable" type="text" class="mt-1 block w-full" value="{{$isr->porcentaje_aplicable}}" autofocus />
                        </div>

                        <div class="text-center mt-3"><button class="btn btn-success w-100" type="submit">Guardar</button></div>
    

                    </div>
                </form>
            </div>
        </div>
        
    </div>

</x-layout-admin>