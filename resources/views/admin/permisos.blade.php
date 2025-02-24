<x-layout-admin title="Panel de administracion">
    <div class="m-3">
        <h1>Administrar permisos</h1>
    </div>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Matricula</th>
                <th scope="col">Empĺeado</th>
                <th scope="col">Descripción</th>
                <th scope="col" colspan=2>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permisos as $permisos)
                <tr>
                    <td>{{ $permisos->fecha }}</td>
                    <td>{{ $permisos->empleado->matricula }}</td>
                    <td>{{ $permisos->empleado->persona->nombre." ".$permisos->empleado->persona->ap_paterno." ".$permisos->empleado->persona->ap_materno }}</td>
                    <td>{{ $permisos->descripcion }}</td>
                    <td>  
                        <form action="{{ route('admin-permisos-allow', $permisos->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de aceptar este permiso?');">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success">Aceptar</button>
                        </form>
                    </td>
                    
                    <td>  
                        <form action="{{ route('admin-permisos-deny', $permisos->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de rechazar este permiso?');">
                            @csrf
                            @method('PUT')

                            <button class="btn btn-danger">Rechazar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout-admin>