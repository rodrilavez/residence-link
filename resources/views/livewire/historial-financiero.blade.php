<div>
    <h3>Historial Financiero</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Monto</th>
                <th>Descripción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $pago)
                <tr>
                    <td>{{ $pago->monto }}</td>
                    <td>{{ $pago->descripcion }}</td>
                    <td>{{ $pago->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
