<div>
    <h2>Zonas</h2>

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" wire:model="nombre" placeholder="Nombre">
            @error('nombre') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" wire:model="descripcion" placeholder="Descripción">
            @error('descripcion') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">{{ $isEdit ? 'Actualizar' : 'Crear' }}</button>
        @if($isEdit)
            <button type="button" wire:click="resetForm">Cancelar</button>
        @endif
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($zonas as $zona)
            <tr>
                <td>{{ $zona->id }}</td>
                <td>{{ $zona->nombre }}</td>
                <td>{{ $zona->descripcion }}</td>
                <td>
                    <button wire:click="edit({{ $zona->id }})">Editar</button>
                    <button wire:click="delete({{ $zona->id }})">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
