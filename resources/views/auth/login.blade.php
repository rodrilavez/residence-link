@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh; background-color: #f9f9f9;">
    <div class="card p-4" style="width: 100%; max-width: 400px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #4CAF50;">Bienvenido</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label" style="font-weight: 600; color: #333;">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" required autofocus style="border-radius: 8px; border: 1px solid #ddd; padding: 10px;">
                @error('email') <span class="text-danger" style="font-size: 0.9rem;">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="font-weight: 600; color: #333;">Contraseña</label>
                <input type="password" name="password" class="form-control" required style="border-radius: 8px; border: 1px solid #ddd; padding: 10px;">
                @error('password') <span class="text-danger" style="font-size: 0.9rem;">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn w-100" style="background-color: #4CAF50; color: white; border-radius: 8px; padding: 10px 20px; font-weight: 600;">Iniciar Sesión</button>
        </form>
    </div>
</div>
@endsection
