<div>
    <form wire:submit.prevent="store">
        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" wire:model="titulo">
            @error('titulo') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" wire:model="descripcion"></textarea>
            @error('descripcion') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Guardar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incidencias as $incidencia)
                <tr>
                    <td>{{ $incidencia->titulo }}</td>
                    <td>{{ $incidencia->descripcion }}</td>
                    <td>
                        <button wire:click="edit({{ $incidencia->id }})">Editar</button>
                        <button wire:click="delete({{ $incidencia->id }})">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
