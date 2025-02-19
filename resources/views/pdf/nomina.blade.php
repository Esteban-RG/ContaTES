<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nómina PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
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
</body>
</html>
