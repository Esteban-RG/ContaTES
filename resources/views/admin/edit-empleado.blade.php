<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Administrar empleado</h1>
    </div>
    
    <div class="d-flex  mb-3">
        <a href="{{route ('admin-empleado')}}" class="btn btn-success" >Volver</a>
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


    <div class="new align-items-center ">

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route ('admin-empleado-update' , $empleado->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class=" mt-6 space-y-6 p-4 ">
                        
                    
                                            
                        
                        <div>
                            <h1>{{isset($empleado->persona->nombre) ? 
                                $empleado->persona->ap_paterno." ".$empleado->persona->ap_materno." ".$empleado->persona->nombre : 
                                $empleado->user->name}}</h1>
                        </div>
                        
                        <div>
                            <label for="dynamicCombobox" class="form-label">Selecciona plaza</label>
                            <select class="form-select" id="plaza_id" name="plaza_id">
                                @foreach($plazas as $plaza)
                                    <option value="{{ $plaza->id }}" {{ $plaza->id == $empleado->plaza_id ? 'selected' : " " }}>{{ $plaza->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="matricula" :value="__('Matricula')" />
                            <x-text-input id="matricula" name="matricula" type="number" class="mt-1 block w-full"  value="{{ $empleado->matricula}}" required autofocus />
                        </div>

                        <div>
                            <x-input-label for="fecha_ingreso" :value="__('Fecha de ingreso')" />
                            <x-text-input id="fecha_ingreso" name="fecha_ingreso" type="date" class="mt-1 block w-full" value="{{ $empleado->fecha_ingreso}}" required autofocus />
                        </div>

                        
                        <div class="text-center mt-3"><button class="btn btn-success w-100" type="submit">Guardar</button></div>

                    </div>
                </form>
            </div>
        </div>
        
    </div>

</x-layout-admin>