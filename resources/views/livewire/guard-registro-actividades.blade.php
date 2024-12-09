<div>
    <h3>Registrar Actividad</h3>
    <form wire:submit.prevent="registrar">
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
            <label for="tipo" class="form-label">Tipo de Actividad:</label>
            <select id="tipo" wire:model="tipo" class="form-control">
                <option value="">Seleccione un tipo</option>
                <option value="entrada">Entrada</option>
                <option value="salida">Salida</option>
            </select>
            @error('tipo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="descripcion" wire:model="descripcion" class="form-control"></textarea>
            @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
