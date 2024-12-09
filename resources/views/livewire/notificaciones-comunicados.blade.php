<div>
    <h3>Notificaciones y Comunicados</h3>
    <ul>
        @foreach($notificaciones as $notificacion)
            <li>
                <strong>{{ $notificacion->title }}</strong><br>
                {{ $notificacion->message }}<br>
                <small>Enviado el {{ $notificacion->created_at->format('d/m/Y H:i') }}</small>
            </li>
        @endforeach
    </ul>
</div>
