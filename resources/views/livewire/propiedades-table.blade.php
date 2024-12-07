<div>
    <form wire:submit.prevent="store" class="mb-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" wire:model="nombre" class="form-control">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" wire:model="direccion" class="form-control">
            @error('direccion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="text" id="precio" wire:model="precio" class="form-control">
            @error('precio') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($propiedades as $propiedad)
                <tr>
                    <td>{{ $propiedad->nombre }}</td>
                    <td>{{ $propiedad->direccion }}</td>
                    <td>{{ $propiedad->precio }}</td>
                    <td>
                        <button wire:click="edit({{ $propiedad->id }})" class="btn btn-primary btn-sm">Editar</button>
                        <button wire:click="delete({{ $propiedad->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
