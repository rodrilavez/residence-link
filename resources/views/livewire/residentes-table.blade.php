<div>
    <form wire:submit.prevent="store" class="mb-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" wire:model="nombre" class="form-control">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad:</label>
            <input type="text" id="edad" wire:model="edad" class="form-control">
            @error('edad') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" wire:model="direccion" class="form-control">
            @error('direccion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($residentes as $residente)
                <tr>
                    <td>{{ $residente->nombre }}</td>
                    <td>{{ $residente->edad }}</td>
                    <td>{{ $residente->direccion }}</td>
                    <td>
                        <button wire:click="edit({{ $residente->id }})" class="btn btn-primary btn-sm">Editar</button>
                        <button wire:click="delete({{ $residente->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
