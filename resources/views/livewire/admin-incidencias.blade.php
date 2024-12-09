<div>
    <h3>Incidencias Reportadas</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Residente</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incidencias as $incidencia)
                <tr>
                    <td>{{ $incidencia->residente->user->name }}</td>
                    <td>{{ $incidencia->descripcion }}</td>
                    <td>{{ $incidencia->estado }}</td>
                    <td>{{ $incidencia->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
