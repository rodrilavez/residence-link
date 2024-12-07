<div>
    <form wire:submit.prevent="store">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" wire:model="nombre">
            @error('nombre') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="hora_inicio">Hora Inicio:</label>
            <input type="text" id="hora_inicio" wire:model="hora_inicio">
            @error('hora_inicio') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="hora_fin">Hora Fin:</label>
            <input type="text" id="hora_fin" wire:model="hora_fin">
            @error('hora_fin') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Guardar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
                <tr>
                    <td>{{ $horario->nombre }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>
                        <button wire:click="edit({{ $horario->id }})">Editar</button>
                        <button wire:click="delete({{ $horario->id }})">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
