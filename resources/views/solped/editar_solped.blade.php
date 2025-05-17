@extends('layout.nav')
@section('title', 'Editar Solped')
@section('content')

<div class="main-card mb-3 card">
    <div class="card-body"><h4 class="card-title">Actualizar Datos de Solped</h4>
        
<form class="settings-form" action="{{route('editar_solped', ['id' => $solped->id])}}" method="POST">
    @method('PUT')
    @csrf
    <div class=""> 
        <div class="row">
            <div class="col">
                <label for="setting-input-2" class="form-label">Descripción / Cabecera</label>
                <input type="text" name="descripcion" value="{{$solped->descripcion}}" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="setting-input-2" class="form-label">Solicitante</label>
                <input type="text" name="solicitante" value="{{$solped->solicitante}}" class="form-control" required>
            </div>
            <div class="col">
                <label for="setting-input-2" class="form-label">Estado</label>
                <select name="estado" class="form-select" required>
                    @switch($solped->estado)
                        @case('Pendiente_P')
                            <option value="Pendiente_P" selected>Pendiente de pedido</option>
                            <option value="Pendiente_E">Pendiente de entrada</option>
                            <option value="Finalizada">Finalizada</option>
                            @break
                        @case('Pendiente_E')
                            <option value="Pendiente_P">Pendiente de pedido</option>
                            <option value="Pendiente_E" selected>Pendiente de entrada</option>
                            <option value="Finalizada">Finalizada</option>
                            @break
                        @case('Finalizada')
                            <option value="Pendiente_P">Pendiente de pedido</option>
                            <option value="Pendiente_E">Pendiente de entrada</option>
                            <option value="Finalizada" selected>Finalizada</option>
                            @break
                        @default
                    @endswitch
                </select>
            </div>
        </div>

   {{--      <script>
           $(document).ready(function() {
            $("#btn_pedido").click(function() {
                $("#input_pedido").prop("disabled", false);
                });
            });
        </script>
 --}}
        <div class="row">
            <div class="col">
                <label class="form-label">Solped</label>
                <input type="text" name="solped" value="{{$solped->solped}}" class="form-control">
            </div>

            <div class="col">
                <label class="form-label">Pedido</label>
                <div class="input-group">
                    <input type="text" name="pedido" value="{{$solped->pedido}}" id="input_pedido" class="form-control">
                    {{-- <button class="btn btn-info" type="button" id="btn_pedido"><i class="bi bi-pencil-fill"></i></button> --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label">UM</label>
                <input type="text" name="um" value="{{$solped->um}}" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Cantidad</label>
                <input type="text" name="cantidad" value="{{$solped->cantidad}}" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Total</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" name="total" value="{{$solped->total}}" id="input_pedido" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label">Fecha de entrega</label>
                <input type="date" name="fecha_entrega" class="form-control" value="{{$solped->fecha_entrega}}" required>
            </div>
        </div>


        <label for="message-text" class="col-form-label">Entradas</label>
        <div class="input-group">
            <textarea style="min-height: 4rem;" type="text" name="entrada" class="form-control" id="input_entrada">{{$solped->entrada}}</textarea>
            {{-- <button class="btn btn-info" type="button" id="btn_entrada"><i class="bi bi-pencil-fill"></i></button> --}}
        </div>

        <div class="form-group">
            <label for="message-text" class="col-form-label">Observaciones</label>
            <textarea style="min-height: 4rem;" name="observaciones" class="form-control" id="message-text">{{$solped->observaciones}}</textarea>
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

