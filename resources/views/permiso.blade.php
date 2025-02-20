<x-layout title="Nomina">
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    
                    
                    
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Solicitar un permiso
                                </h2>
                            </header>       
                            

                            <form method="post" action="{{ route('store-permiso') }}" class="mt-6 space-y-6">
                                @csrf
                                
                                
                                
                                
                                <div>
                                    <label for="dynamicCombobox" class="form-label">Selecciona tipo de permiso</label>
                                    <select class="form-select" id="descripcion" name="descripcion">
                                        <option selected>Selecciona tipo de permiso</option>
                                        <option value="sin_sueldo">Sin goce de sueldo</option>
                                        <option value="economico">Dia economico</option>
                                        <option value="falta">Falta</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />

                                </div>

                                <div>
                                    <x-input-label for="fecha" :value="__('Fecha')" />
                                    <input type="date" id="fecha" name="fecha" type="text" class="mt-1 block w-full form-control shadow-sm border rounded"  required autofocus>
                                    <x-input-error class="mt-2" :messages="$errors->get('fecha')" />
                                </div>
                                
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Solicitar') }}</x-primary-button>
                                </div>
                            </form>

                            <h2 class="text-lg font-medium text-gray-900 mt-3">
                                Permisos solicitados
                            </h2>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permisos as $permiso)
                                        <tr>
                                            <td>{{ $permiso->fecha }}</td>
                                            <td>{{ $permiso->descripcion }}</td>
                                            <td>{{ $permiso->estado }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>