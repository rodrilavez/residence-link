<div>
    <form wire:submit.prevent="assignIncidencia">
        <div class="mb-3">
            <label for="residente_id" class="form-label">Residente:</label>
            <select id="residente_id" wire:model="residente_id" class="form-control">
                <option value="">Seleccione un residente</option>
                @foreach($residentes as $residente)
                    <option value="{{ $residente->id }}">{{ $residente->user->name }}</option>
                @endforeach
            </select>
            @error('residente_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="amenidad_id" class="form-label">Amenidad:</label>
            <select id="amenidad_id" wire:model="amenidad_id" class="form-control">
                <option value="">Seleccione una amenidad</option>
                @foreach($amenidades as $amenidad)
                    <option value="{{ $amenidad->id }}">{{ $amenidad->nombre }}</option>
                @endforeach
            </select>
            @error('amenidad_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="descripcion" wire:model="descripcion" class="form-control"></textarea>
            @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Asignar Incidencia</button>
    </form>
</div>
