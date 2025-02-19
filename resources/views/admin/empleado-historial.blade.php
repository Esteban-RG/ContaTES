<x-layout-admin title="Panel de administracion">
                    
                    
    
        
                <div class="m-3">
                    <h1>Historial de nomina</h1>
                </div>    
                            
                <div class="d-flex  mb-3">
                    <a href="{{route ('admin-empleado-details',$empleado->id)}}" class="btn btn-success" >Volver</a>
                </div>
                

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
                                    <a href="{{ route('details-nomina',  $nomina->id) }}" class="btn btn-secondary" target="_blank">Details</a>
                                </td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          

</x-layout-admin>