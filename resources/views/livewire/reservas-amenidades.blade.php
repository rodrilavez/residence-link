<div>
    <h3>Reservar Amenidades</h3>
    <ul>
        @foreach($amenidades as $amenidad)
            <li>
                {{ $amenidad->nombre }}
                <button wire:click="reservarAmenidad({{ $amenidad->id }})" class="btn btn-primary">Reservar</button>
            </li>
        @endforeach
    </ul>

    <h3>Mis Reservas</h3>
    <ul>
        @foreach($reservas as $reserva)
            <li>{{ $reserva->amenidad->nombre }} - {{ $reserva->fecha }}</li>
        @endforeach
    </ul>
</div>
