<div>
    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" wire:model="nombre" class="form-control">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
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
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" wire:model="direccion" class="form-control">
            @error('direccion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="es_amenidad" class="form-label">Es Amenidad:</label>
            <input type="checkbox" id="es_amenidad" wire:model="es_amenidad" class="form-check-input">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Propiedad</button>
    </form>
</div> 