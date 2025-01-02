@extends('layout.nav')
@section('title', 'Agregar Usuario')
@section('content')

<div class="app-card app-card-settings shadow-sm p-4">
    <h4 style="font-weight: bold;">Agregar Usuarios</h4>
    <hr class="mb-4">
    <div class="app-card-body">
        <form class="settings-form" action="{{route('editar_usuarios', ['id' => $usuario->id])}}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col">
                  <label for="setting-input-2" class="form-label">Nombre(s)</label>
                  <input type="text" name="nombre" value="{{$usuario->nombre}}" class="form-control" required>
                </div>
                <div class="col">
                  <label for="setting-input-2" class="form-label">Apellido Paterno</label>
                  <input type="text" name="apellidoPaterno" value="{{$usuario->apellidoPaterno}}" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                  <label for="setting-input-2" class="form-label">Apellido Materno</label>
                  <input type="text" name="apellidoMaterno" value="{{$usuario->apellidoMaterno}}" class="form-control">
                </div>
                <div class="col">
                  <label for="setting-input-2" class="form-label">Usuario</label>
                  <input type="text" name="usuario" value="{{$usuario->usuario}}" class="form-control" required>
                </div>
            </div>

            <div class="col">
              <label for="setting-input-2" class="form-label">Contraseña</label>
              <input type="password" name="contrasena" class="form-control">
            </div>

            <div class="mb-3">
                <label for="setting-input-2" class="form-label">Departamento</label>
                <select type="text" name="departamento" class="form-select" id="setting-input-2" required>
                    <option value="{{$usuario->id_departamento}}">{{$usuario->departamento->nombre}}</option>
                    @foreach($departamentos as $departamento)
                      <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{route('usuarios')}}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn app-btn-primary">Guardar Registro</button>
        </form>
    </div>
</div>

@endsection