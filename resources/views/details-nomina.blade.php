<x-layout title="Nomina">
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    

                    
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 text-center">
                                    Detalle de nomina 
                                </h2>
                            </header>       
                            

                            <p>Folio: {{$nomina->id}}</p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="table-secondary">
                                        <th>Empresa</th>
                                        <td>TECNOLOGICO DE ESTUDIOS SUPERIORES DE CHIMALHUACAN</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <th>Nombre</th>
                                        <td>{{$nomina->empleado->persona->nombre." ".$nomina->empleado->persona->ap_paterno." ".$nomina->empleado->persona->ap_materno}}</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <th>Matricula</th>
                                        <td>{{$nomina->empleado->persona->empleado->matricula}}</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <th>Plaza</th>
                                        <td>{{$nomina->empleado->persona->empleado->plaza->nombre}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">
                                        Periodo
                                        </th>
                                        <td>{{ $nomina->fecha_inicio }} - {{ $nomina->fecha_fin }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Percepciones -->
                                    <tr class="table-primary">
                                        <th colspan="2" class="text-center">Percepciones</th>
                                    </tr>
                                    @foreach($nomina->percepciones as $percepcion)
                                        <tr>
                                            <td>{{ $percepcion->nombre }}</td>
                                            <td>{{ number_format($percepcion->valor, 2) }}</td>
                                        </tr>
                                    @endforeach
                            
                                    <!-- Deducciones -->
                                    <tr class="table-danger">
                                        <th colspan="2" class="text-center">Deducciones</th>
                                    </tr>
                                    @foreach($nomina->deducciones as $deduccion)
                                        <tr>
                                            <td>{{ $deduccion->nombre }}</td>
                                            <td>-{{ number_format($deduccion->valor, 2) }}</td>
                                        </tr>
                                    @endforeach
                            
                                    <!-- Totales -->
                                    <tr class="table-secondary">
                                        <th>Salario Bruto</th>
                                        <td>{{ number_format($nomina->salario_bruto, 2) }}</td>
                                    </tr>
                                    <tr class="table-success">
                                        <th>Salario Neto</th>
                                        <td>{{ number_format($nomina->salario_neto, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>

                        <a href="{{ route('nomina-pdf', ['id' => $nomina->id]) }}" class="btn btn-success">Descargar</a>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</x-layout>