<div>
    <h3>Registro de Actividades</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Residente</th>
                <th>Guardia</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actividades as $actividad)
                <tr>
                    <td>{{ $actividad->residente->user->name }}</td>
                    <td>{{ $actividad->guard->name }}</td>
                    <td>{{ ucfirst($actividad->tipo) }}</td>
                    <td>{{ $actividad->descripcion }}</td>
                    <td>{{ $actividad->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
