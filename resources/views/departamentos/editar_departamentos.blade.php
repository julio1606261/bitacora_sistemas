@extends('layout.nav')
@section('title', 'Agregar Departamento')
@section('content')

<div class="app-card app-card-settings shadow-sm p-4">
    <h4 style="font-weight: bold;">Editar Departamento</h4>
    <hr class="mb-4">
    <div class="app-card-body">
        <form class="settings-form" action="{{route('editar_departamentos', ['id' => $departamento->id])}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="setting-input-2" class="form-label">Nombre departamento</label>
                <input type="text" name="nombre" class="form-control" value="{{$departamento->nombre}}" required>
            </div>
            <button type="submit" class="btn app-btn-primary">Guardar Registro</button>
        </form>
    </div>
</div>

@endsection