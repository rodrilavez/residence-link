<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="registrar">
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Actividad:</label>
            <select id="tipo" wire:model="tipo" class="form-control">
                <option value="">Seleccione un tipo</option>
                <option value="entrada">Entrada</option>
                <option value="salida">Salida</option>
                <option value="incidencia">Incidencia</option>
            </select>
            @error('tipo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="residente_id" class="form-label">Residente:</label>
            <select id="residente_id" wire:model="residente_id" class="form-control">
                <option value="">Ninguno</option>
                @foreach($residentes as $residente)
                    <option value="{{ $residente->id }}">{{ $residente->nombre }}</option>
                @endforeach
            </select>
            @error('residente_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="amenidad_id" class="form-label">Amenidad:</label>
            <select id="amenidad_id" wire:model="amenidad_id" class="form-control">
                <option value="">Ninguna</option>
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
        <button type="submit" class="btn btn-primary">Registrar Actividad</button>
    </form>

    <h3>Historial de Actividades</h3>
    <ul>
        @foreach($actividades as $actividad)
            <li>{{ $actividad->created_at }} - {{ ucfirst($actividad->tipo) }}: {{ $actividad->descripcion }}</li>
        @endforeach
    </ul>
</div>
