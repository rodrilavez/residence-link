<div class="container">
    <h2 class="title">Mis Propiedades</h2>
    @if($propiedades->isNotEmpty())
        <ul class="property-list">
        @foreach($propiedades as $prop)
            <li class="property-item">
                <strong>{{ $prop->nombre }}</strong><br>
                {{ $prop->descripcion }}<br>
                Zona: {{ $prop->zona->nombre ?? 'Sin zona' }}
            </li>
        @endforeach
        </ul>
    @else
        <p class="no-properties">No tienes propiedades registradas.</p>
    @endif

    <h2 class="title">Amenidades Disponibles</h2>
    @if($amenidades->isNotEmpty())
        <ul class="amenities-list">
        @foreach($amenidades as $amenidad)
            <li class="amenity-item">
                <strong>{{ $amenidad->nombre }}</strong><br>
                {{ $amenidad->descripcion }}<br>
                <!-- Opcional: botón de reserva -->
                <!-- <button wire:click="reservarAmenidad({{ $amenidad->id }})" class="btn btn-secondary">Reservar</button> -->
            </li>
        @endforeach
        </ul>
    @else
        <p class="no-amenities">No hay amenidades disponibles en tu zona.</p>
    @endif
</div>
