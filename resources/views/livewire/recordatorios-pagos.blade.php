<div>
    <h3>Enviar Recordatorio de Pago</h3>
    <form wire:submit.prevent="enviarRecordatorio">
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
            <label for="fecha_recordatorio" class="form-label">Fecha del Recordatorio:</label>
            <input type="date" id="fecha_recordatorio" wire:model="fecha_recordatorio" class="form-control">
            @error('fecha_recordatorio') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="monto" class="form-label">Monto:</label>
            <input type="number" id="monto" wire:model="monto" class="form-control" step="0.01">
            @error('monto') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje:</label>
            <textarea id="mensaje" wire:model="mensaje" class="form-control"></textarea>
            @error('mensaje') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar Recordatorio</button>
    </form>

    <!-- Display the list of reminders -->
    <h4>Recordatorios Enviados</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Residente</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($residentes as $residente)
                @foreach($residente->pagos as $pago)
                    <tr>
                        <td>{{ $residente->user->name }}</td>
                        <td>{{ $pago->fecha_recordatorio }}</td>
                        <td>{{ $pago->monto }}</td>
                        <td>{{ $pago->mensaje }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
