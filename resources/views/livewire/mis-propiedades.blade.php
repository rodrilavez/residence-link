<div class="container">
    <div>
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
    </div>

    <div>
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

    <style>
    .container {
        padding: 20px;
    }

    .title {
        font-size: 1.8em;
        margin-bottom: 15px;
    }

    .property-list, .amenities-list {
        list-style-type: none;
        padding: 0;
    }

    .property-item, .amenity-item {
        background-color: #f9f9f9;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .no-properties, .no-amenities {
        color: #888;
        font-style: italic;
    }
    </style>
</div>
