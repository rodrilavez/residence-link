<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="assignProperty">
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario:</label>
            <select id="user_id" wire:model="user_id" class="form-control">
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }} ({{ $usuario->email }})</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="propiedad_id" class="form-label">Propiedad:</label>
            <select id="propiedad_id" wire:model="propiedad_id" class="form-control">
                <option value="">Seleccione una propiedad</option>
                @foreach($propiedades as $propiedad)
                    <option value="{{ $propiedad->id }}">{{ $propiedad->nombre }} - {{ $propiedad->direccion }}</option>
                @endforeach
            </select>
            @error('propiedad_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Asignar Propiedad</button>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Propiedad</th>
                <th>Dirección</th>
                <th>Zona</th>
            </tr>
        </thead>
        <tbody>
            @foreach($residentes as $residente)
                <tr>
                    <td>{{ $residente->user->name }}</td>
                    <td>{{ $residente->user->email }}</td>
                    <td>{{ $residente->propiedad->nombre }}</td>
                    <td>{{ $residente->propiedad->direccion }}</td>
                    <td>{{ $residente->propiedad->zona->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
