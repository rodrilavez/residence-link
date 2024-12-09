<div>
    <h3>Amenidades Disponibles</h3>
    <ul>
        @foreach($amenidades as $amenidad)
            <li>{{ $amenidad->nombre }} - {{ $amenidad->descripcion }}</li>
        @endforeach
    </ul>
</div>
