@extends('layouts.app')

@section('content')
<div class="dashboard-container">
  <header class="dashboard-header">
    <h1>Residence Link - Dashboard</h1>
    <p class="welcome-message">Bienvenido, {{ Auth::user()->name }} <span class="user-role">(Rol: {{ Auth::user()->role }})</span></p>
  </header>

  <div class="dashboard-content">
    @if(Auth::user()->role === 'admin')
        <section class="admin-section">
          <div class="card">
            <h2>Gestión de Zonas</h2>
            @livewire('zonas-table') 
          </div>

          <div class="card">
            <h2>Gestión de Propiedades</h2>
            @livewire('propiedades-table')
          </div>

          <div class="card">
            <h2>Gestión de Guardias</h2>
            @livewire('guardias-table')
          </div>

          <div class="card">
            <h2>Gestión de Residentes</h2>
            @livewire('residentes-table')
          </div>
        </section>

    @elseif(Auth::user()->role === 'guard')
        <section class="guard-section">
          <div class="card">
            <h2>Mis Horarios</h2>
            @livewire('horarios-table', ['guardia_id' => Auth::user()->guardia->id ?? null])
          </div>
        </section>

    @elseif(Auth::user()->role === 'residente')
        <section class="residente-section">
          <div class="card">
            <h2>Mis Propiedades y Amenidades</h2>
            @livewire('mis-propiedades')
          </div>

          <div class="card">
            <h2>Reportar Incidencia</h2>
            @livewire('incidencia-form')
          </div>

          <div class="card">
            <h2>Pagos y Finanzas</h2>
            @livewire('pagos-finanzas')
          </div>
        </section>
    @endif
  </div>
</div>

<style>
  .dashboard-container {
    font-family: Arial, sans-serif;
    padding: 20px;
    background-color: #f9f9f9;
    color: #333;
  }

  .dashboard-header {
    text-align: center;
    margin-bottom: 30px;
    background-color: #4CAF50;
    color: white;
    padding: 20px;
    border-radius: 8px;
  }

  .welcome-message {
    font-size: 18px;
    margin-top: 10px;
  }

  .user-role {
    font-weight: bold;
  }

  .dashboard-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
  }

  .card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: box-shadow 0.3s;
  }

  .card h2 {
    font-size: 22px;
    margin-bottom: 15px;
  }

  .card:hover {
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
  }

  .admin-section, .guard-section, .residente-section {
    margin-top: 20px;
  }
</style>
@endsection
