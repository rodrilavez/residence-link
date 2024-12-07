@extends('layouts.app')

@section('content')
  <h1>Dashboard</h1>
  <p>Bienvenido, {{ Auth::user()->name }} (Rol: {{ Auth::user()->role }})</p>

  @if(Auth::user()->role === 'admin')
      <div>
          <h2>Gestión de Zonas</h2>
          @livewire('zonas-table') 
          <!-- Componente Livewire para CRUD de Zonas -->

          <h2>Gestión de Propiedades</h2>
          @livewire('propiedades-table') 
          <!-- Componente Livewire para CRUD de Propiedades -->

          <h2>Gestión de Guardias</h2>
          @livewire('guardias-table')
          <!-- Componente Livewire para CRUD de Guardias -->

          <h2>Gestión de Residentes</h2>
          @livewire('residentes-table')
          <!-- Componente Livewire para CRUD de Residentes -->
      </div>

  @elseif(Auth::user()->role === 'guard')
      <div>
          <h2>Mis Horarios</h2>
          @livewire('horarios-table', ['guardia_id' => Auth::user()->guardia->id ?? null])
          <!-- Componente para listar y filtrar horarios del guardia autenticado -->
      </div>

  @elseif(Auth::user()->role === 'residente')
      <div>
          <h2>Mis Propiedades y Amenidades</h2>
          @livewire('mis-propiedades') 
          <!-- Componente para listar propiedades y amenidades accesibles para el residente -->
          
          <h2>Reportar Incidencia</h2>
          @livewire('incidencia-form')
          <!-- Componente para reportar incidencias -->
      </div>
  @endif
@endsection
