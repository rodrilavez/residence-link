<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="title">Pagos y Finanzas</h1>
    <form wire:submit.prevent="submit" class="form">
        <div class="form-group">
            <label for="monto">Monto:</label>
            <input type="text" id="monto" wire:model="monto" class="form-control">
            @error('monto') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" wire:model="descripcion" class="form-control"></textarea>
            @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Monto</th>
                <th>Descripción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $pago)
                <tr>
                    <td>{{ $pago->monto }}</td>
                    <td>{{ $pago->descripcion }}</td>
                    <td>{{ $pago->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
