<div>
    <h3>Mis Recordatorios de Pago</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recordatorios as $recordatorio)
                <tr>
                    <td>{{ $recordatorio->fecha_recordatorio }}</td>
                    <td>{{ $recordatorio->monto }}</td>
                    <td>{{ $recordatorio->mensaje }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 