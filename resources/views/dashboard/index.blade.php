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
          <div class="card-row">
            <div class="card">
              <h2>Estadísticas y Reportes</h2>
              <ul>
                <li>Total de Zonas: {{ $totalZonas }}</li>
                <li>Total de Propiedades: {{ $totalPropiedades }}</li>
                <li>Total de Residentes: {{ $totalResidentes }}</li>
                <li>Total de Guardias: {{ $totalGuardias }}</li>
              </ul>
            </div>

            <div class="card">
              <h2>Gestión de Usuarios</h2>
              @livewire('user-management')
            </div>
          </div>

          <div class="card-row">
            <div class="card">
              <h2>Gestión de Zonas</h2>
              @livewire('zonas-table') 
            </div>

            <div class="card">
              <h2>Gestión de Propiedades</h2>
              @livewire('propiedades-table')
            </div>
          </div>

          <div class="card-row">
            <div class="card">
              <h2>Gestión de Residentes</h2>
              @livewire('residentes-table')
            </div>

            <div class="card">
              <h2>Gestión de Guardias</h2>
              @livewire('guardias-table')
            </div>
          </div>

          <div class="card">
            <h2>Asignar Turnos</h2>
            @livewire('assign-turno')
          </div>
        </section>

    @elseif(Auth::user()->role === 'guard')
        <section class="guard-section">
          <div class="card-row">
            <div class="card">
              <h2>Registro de Actividades</h2>
              @livewire('registro-actividades')
            </div>

            <div class="card">
              <h2>Mis Turnos</h2>
              @livewire('view-turnos')
            </div>
          </div>

          <div class="card">
            <h2>Visualización de Residentes y Propiedades</h2>
            @livewire('residentes-propiedades')
          </div>
        </section>

    @elseif(Auth::user()->role === 'residente')
        <section class="residente-section">
          <div class="card-row">
            <div class="card">
              <h2>Mis Propiedades y Amenidades</h2>
              <div>
                @livewire('amenidades-zona')
              </div>
              <div>
                @livewire('mis-propiedades')
              </div>
            </div>

            <div class="card">
              <h2>Reservas de Amenidades</h2>
              <div>
                @livewire('reservas-amenidades')
                @livewire('mis-reservas')
              </div>
            </div>
          </div>

          <div class="card-row">
            <div class="card">
              <h2>Notificaciones y Comunicados</h2>
              <div>
                @livewire('notificaciones-comunicados')
              </div>
            </div>

            <div class="card">
              <h2>Reportar Incidencia</h2>
              <div>
                @livewire('incidencia-form')
                @livewire('estado-incidencias')
              </div>
            </div>
          </div>

          <div class="card">
            <h2>Historial Financiero</h2>
            <div>
              @livewire('historial-financiero')
              @livewire('recordatorios-pagos')
            </div>
          </div>
        </section>
    @endif
  </div>
</div>

<style>
  .dashboard-container {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding: 20px;
    background-color: #f4f7fa;
    color: #333;
  }

  .dashboard-header {
    text-align: center;
    margin-bottom: 30px;
    background-color: #007bff;
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
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding: 20px;
  }

  .card h2 {
    font-size: 1.5em;
    margin-bottom: 15px;
  }

  .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  .table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  .table th {
    background-color: #f2f2f2;
  }

  .alert {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
  }

  .alert-success {
    background-color: #d4edda;
    color: #155724;
  }

  .alert-danger {
    background-color: #f8d7da;
    color: #721c24;
  }

  .btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .btn-primary {
    background-color: #007bff;
    color: white;
  }

  .btn-success {
    background-color: #28a745;
    color: white;
  }

  .btn-danger {
    background-color: #dc3545;
    color: white;
  }

  .btn-secondary {
    background-color: #6c757d;
    color: white;
  }

  .admin-section, .guard-section, .residente-section {
    margin-top: 20px;
  }
</style>
@endsection
