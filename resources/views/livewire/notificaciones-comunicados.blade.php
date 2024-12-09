<div>
    <h3>Notificaciones y Comunicados</h3>
    <ul>
        @foreach($notificaciones as $notificacion)
            <li>{{ $notificacion->titulo }} - {{ $notificacion->mensaje }}</li>
        @endforeach
    </ul>
</div>
