<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="assign">
        <div class="mb-3">
            <label for="user_id" class="form-label">Guardia:</label>
            <select id="user_id" wire:model="user_id" class="form-control">
                <option value="">Seleccione un guardia</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="inicio" class="form-label">Inicio:</label>
            <input type="datetime-local" id="inicio" wire:model="inicio" class="form-control">
            @error('inicio') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="fin" class="form-label">Fin:</label>
            <input type="datetime-local" id="fin" wire:model="fin" class="form-control">
            @error('fin') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Asignar Turno</button>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Zona Asignada</th>
                <th>Turno</th>
                <th>Tiempo Restante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($turnos as $turno)
                <tr>
                    <td>{{ $turno->user->name }}</td>
                    <td>{{ $turno->user->guardia->zona->nombre ?? 'No asignada' }}</td>
                    <td>{{ $turno->inicio }} - {{ $turno->fin }}</td>
                    <td>
                        @php
                            $now = \Carbon\Carbon::now();
                            $end = \Carbon\Carbon::parse($turno->fin);
                            $diff = $end->diffForHumans($now, ['parts' => 2]);
                        @endphp
                        {{ $diff }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
