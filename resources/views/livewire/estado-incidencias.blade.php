<div>
    <h3>Estado de Incidencias</h3>
    <ul>
        @foreach($incidencias as $incidencia)
            <li>{{ $incidencia->descripcion }} - Estado: {{ $incidencia->estado }}</li>
        @endforeach
    </ul>
</div>
