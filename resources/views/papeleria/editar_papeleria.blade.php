@extends('layout.nav')
@section('title', 'Editar Solped')
@section('content')

<div class="main-card mb-3 card">
    <div class="card-body"><h4 class="card-title">Actualizar Datos de Papeleria</h4>
        
<form class="settings-form" action="{{route('editar_papeleria', ['id' => $papeleria->id])}}" method="POST">
    @method('PUT')
    @csrf
    <div class=""> 
        <div class="row">
            <div class="col">
                <label for="setting-input-2" class="form-label">Descripción </label>
                <input type="text" name="descripcion" value="{{$papeleria->descripcion}}" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="setting-input-2" class="form-label">Cantidad</label>
                <input type="text" name="solicitante" value="{{$papeleria->cantidad}}" class="form-control" required>
            </div>
            <div class="col">
                <label for="setting-input-2" class="form-label">Solicitante </label>
                <input type="text" name="solicitante" value="{{$papeleria->solicitante}}" class="form-control" required>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <label for="setting-input-2" class="form-label">Estado</label>
                <select name="estado" class="form-select" required>
                    @switch($papeleria->estado)
                        @case('Solicitado')
                            <option value="Solicitado" selected>Solicitado</option>
                            <option value="Entregado">Entregado</option>
                            @break
                        @case('Entregado')
                            <option value="Entregado" selected>Entregado</option>
                            <option value="Solicitado">Solicitado</option>
                            @break
                    @endswitch
                </select>
            </div>
            <div class="col">
                <label class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control" value="{{$papeleria->fecha}}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="message-text" class="col-form-label">Observaciones</label>
            <textarea style="min-height: 4rem;" name="observaciones" class="form-control" id="message-text">{{$papeleria->observaciones}}</textarea>
        </div>
    </div>
    <br>
    <div class="footer">
        <button type="submit" class="btn btn-primary" style="color:white;">Actualizar Registro</button>
    </div>
</form>
    </div>
</div>


@endsection

