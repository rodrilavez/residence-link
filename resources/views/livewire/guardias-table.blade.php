<div>
    <form wire:submit.prevent="store" class="mb-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" wire:model="nombre" class="form-control">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="turno" class="form-label">Turno:</label>
            <input type="text" id="turno" wire:model="turno" class="form-control">
            @error('turno') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Turno</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guardias as $guardia)
                <tr>
                    <td>{{ $guardia->nombre }}</td>
                    <td>{{ $guardia->turno }}</td>
                    <td>
                        <button wire:click="edit({{ $guardia->id }})" class="btn btn-primary btn-sm">Editar</button>
                        <button wire:click="delete({{ $guardia->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
