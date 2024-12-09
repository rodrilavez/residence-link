<div>
    <h3>Residentes en mi Zona</h3>
    <ul>
        @foreach($residentes as $residente)
            <li>{{ $residente->user->name }} - {{ $residente->propiedad->nombre }}</li>
        @endforeach
    </ul>

    <h3>Propiedades en mi Zona</h3>
    <ul>
        @foreach($propiedades as $propiedad)
            <li>{{ $propiedad->nombre }} - {{ $propiedad->direccion }}</li>
        @endforeach
    </ul>
</div>
