<div>
    <h3>Mis Reservas</h3>
    <ul>
        @forelse($reservas as $reserva)
            <li>{{ $reserva->amenidad->nombre }} - {{ $reserva->fecha }}</li>
        @empty
            <li>No hay reservas disponibles.</li>
        @endforelse
    </ul>
</div> 