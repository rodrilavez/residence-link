<div>
    <h3>Turnos Pasados</h3>
    <ul>
        @foreach($turnosPasados as $turno)
            <li>{{ $turno->inicio }} - {{ $turno->fin }}</li>
        @endforeach
    </ul>

    <h3>Turnos Actuales</h3>
    <ul>
        @foreach($turnosActuales as $turno)
            <li>{{ $turno->inicio }} - {{ $turno->fin }}</li>
        @endforeach
    </ul>

    <h3>Turnos Próximos</h3>
    <ul>
        @foreach($turnosProximos as $turno)
            <li>{{ $turno->inicio }} - {{ $turno->fin }}</li>
        @endforeach
    </ul>
</div>
