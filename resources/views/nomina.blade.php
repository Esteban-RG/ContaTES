<x-layout title="Nomina">
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    
                    
                    
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Historial de nomina
                                </h2>
                            </header>       
                            

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Inicio</th>
                                        <th scope="col">Final</th>
                                        <th scope="col" >Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nominas as $nomina)
                                        <tr>
                                            <td>{{ $nomina->fecha_inicio }}</td>
                                            <td>{{ $nomina->fecha_fin }}</td>
                                            <td>                        
                                                <a href="{{ route('details-nomina',  $nomina->id) }}" class="btn btn-secondary">Details</a>
                                            </td>
                                        
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