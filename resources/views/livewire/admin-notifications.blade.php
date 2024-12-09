<div>
    <h3>Enviar Notificación</h3>
    <form wire:submit.prevent="sendNotification">
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" id="title" wire:model="title" class="form-control">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensaje:</label>
            <textarea id="message" wire:model="message" class="form-control"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
