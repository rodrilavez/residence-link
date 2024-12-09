<div>
    <h3>Reservas de Amenidades</h3>
    @if($amenidades->isEmpty())
        <p>No hay amenidades disponibles.</p>
    @else
        <ul>
            @foreach($amenidades as $amenidad)
                <li>
                    {{ $amenidad->nombre }} - {{ $amenidad->direccion }}
                    <button wire:click="reservar({{ $amenidad->id }}, '{{ now()->format('Y-m-d') }}')">Reservar Hoy</button>
                </li>
            @endforeach
        </ul>
    @endif

    <h3>Mis Reservas</h3>
    @if($reservas->isEmpty())
        <p>No hay reservas disponibles.</p>
    @else
        <ul>
            @foreach($reservas as $reserva)
                <li>
                    {{ $reserva->amenidad->nombre }} - {{ $reserva->fecha_reserva }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
