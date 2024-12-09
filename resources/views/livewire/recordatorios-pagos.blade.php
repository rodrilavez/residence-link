<div>
    <h3>Recordatorios de Pagos</h3>
    <ul>
        @foreach($recordatorios as $recordatorio)
            <li>{{ $recordatorio->descripcion }} - Fecha: {{ $recordatorio->fecha_recordatorio->format('d/m/Y') }}</li>
        @endforeach
    </ul>
</div>
