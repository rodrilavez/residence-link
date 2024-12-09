<div>
    <form wire:submit.prevent="store" class="mb-4">
        <div class="mb-3">
            <label for="user_id" class="form-label">Guardia:</label>
            <select id="user_id" wire:model="user_id" class="form-control">
                <option value="">Seleccione un guardia</option>
                @foreach($usuariosGuard as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="zona_id" class="form-label">Zona:</label>
            <select id="zona_id" wire:model="zona_id" class="form-control">
                <option value="">Seleccione una zona</option>
                @foreach($zonas as $zona)
                    <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                @endforeach
            </select>
            @error('zona_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Guardia</th>
                <th>Zona</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guardias as $guardia)
                <tr>
                    <td>{{ $guardia->user->name }}</td>
                    <td>{{ $guardia->zona->nombre }}</td>
                    <td>
                        <button wire:click="edit({{ $guardia->id }})" class="btn btn-primary btn-sm">Editar</button>
                        <button wire:click="delete({{ $guardia->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
