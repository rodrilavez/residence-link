<div>
    <h3>Reservas de Amenidades</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Amenidad</th>
                <th>Residente</th>
                <th>Fecha de Reserva</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->amenidad->nombre }}</td>
                    <td>{{ $reserva->user->name }}</td>
                    <td>{{ $reserva->fecha_reserva->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
