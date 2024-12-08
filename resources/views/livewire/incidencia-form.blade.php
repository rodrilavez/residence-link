<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="store" class="form">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" wire:model="titulo" class="form-control">
            @error('titulo') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" wire:model="descripcion" class="form-control"></textarea>
            @error('descripcion') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incidencias as $incidencia)
                <tr>
                    <td>{{ $incidencia->titulo }}</td>
                    <td>{{ $incidencia->descripcion }}</td>
                    <td>
                        <button wire:click="edit({{ $incidencia->id }})" class="btn btn-warning">Editar</button>
                        <button wire:click="delete({{ $incidencia->id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
