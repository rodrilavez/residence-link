<div>
    <h2>Zonas</h2>

    <!-- Mensajes de éxito/error -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" wire:model="nombre" class="form-control">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" id="descripcion" wire:model="descripcion" class="form-control">
            @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-success">{{ $isEdit ? 'Actualizar' : 'Crear' }}</button>
        @if($isEdit)
            <button type="button" wire:click="resetForm" class="btn btn-secondary">Cancelar</button>
        @endif
    </form>

    <table class="table table-striped mt-4">
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
                        <button wire:click="edit({{ $zona->id }})" class="btn btn-primary btn-sm">Editar</button>
                        <button wire:click="delete({{ $zona->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('success', message => {
            const successMessage = document.getElementById('success-message');
            successMessage.textContent = message;
            successMessage.classList.remove('d-none');
            setTimeout(() => successMessage.classList.add('d-none'), 3000);
        });

        Livewire.on('error', message => {
            const errorMessage = document.getElementById('error-message');
            errorMessage.textContent = message;
            errorMessage.classList.remove('d-none');
            setTimeout(() => errorMessage.classList.add('d-none'), 3000);
        });
    });
</script>
