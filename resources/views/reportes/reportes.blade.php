@extends('layout.nav')
@section('title', 'Reportes')
@section('content')

<div class="app-card app-card-settings shadow-sm p-4">
  <h4 style="font-weight: bold;">Genera un reporte de los eventos</h4>
  <hr class="mb-4">
  <div class="app-card-body">
      <form class="settings-form" action="{{-- {{route('editar_departamentos', ['id' => $departamento->id])}} --}}" method="POST">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col">
              <label for="inputEmail4" class="form-label">Fecha inicio</label>
              <input type="date" class="form-control">
            </div>

            <div class="col">
              <label for="inputPassword4" class="form-label">Fecha fin</label>
              <input type="date" class="form-control">
            </div>
          </div>
          <br>
          <button type="submit" class="btn app-btn-primary">Buscar Registros</button>
      </form>
  </div>
</div>
@endsection