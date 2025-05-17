@extends('layout.nav')
@section('title', 'Papeleria')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Administración papeleria</h1>
        </div>

        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" id="input_buscar" class="form-control search-orders" placeholder="Buscar">
                            </div>
                        </form>    
                    </div>

                    <div class="col-auto">  
                        <form action="" method="GET">
                        @method('GET')     
                        <select class="form-select w-auto" name="filtro" onchange="this.form.submit()">
                              <option selected value="filtro_T">Todos</option>
                              <option value="filtro_S">Esta Semana</option>
                              <option value="filtro_M">Este Mes</option>
                              <option value="filtro_U">Ultimos 3 mses</option>   
                        </select>
                        </form>
                    </div>

                    <div class="col-auto">						    
                        <button class="btn app-btn-secondary" type="button" id="editar" data-bs-toggle="modal" data-bs-target="#agregarModal">
                            <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 25 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Nuevo Registro
                        </button>
                    </div>

                    <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Registro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="settings-form" action="{{route('agregar_papeleria')}}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="modal-body"> 
                                    <div class="row">
                                        <div class="col">
                                            <label for="setting-input-2" class="form-label">Descripción</label>
                                            <input type="text" name="descripcion" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <label class="form-label">Cantidad</label>
                                            <input type="text" name="cantidad" class="form-control">
                                        </div>

                                        <div class="col">
                                            <label for="setting-input-2" class="form-label">Solicitante</label>
                                            <input type="text" name="solicitante" class="form-control" required>
                                        </div>
                                    
                                    </div>

                                    <div class="row">

                                        <div class="col">
                                            <label for="setting-input-2" class="form-label">Estado</label>
                                            <select name="estado" class="form-select" required>
                                                <option value="">Elije...</option>
                                                <option value="Solicitado">Solicitado</option>
                                                <option value="Entregado">Entregado</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Fecha</label>
                                            <input type="date" name="fecha" class="form-control" required>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Observaciones</label>
                                        <textarea style="min-height: 4rem;" name="observaciones" class="form-control" id="message-text"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" style="color:white;">Guardar Registro</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div> 

                    <div class="col-auto">						    
                        <a class="btn app-btn-secondary" href="#">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                            </svg>
                            Descargar Excel
                        </a>
                    </div>
                </div><!--//row-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->
           
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left" id="table_solped">
                                    <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Descripción</th>
                                            <th class="cell">Cantidad</th>
                                            <th class="cell">Solicitante</th>
                                            <th class="cell">Fecha</th>
                                            <th class="cell">Observaciones</th>
                                            <th class="cell">Estado</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php $i=1; ?>
                                          @foreach($papeleria as $papel)
                                            <tr id="tr_solped">
                                                <td class="cell">{{$i}}</td>
                                                <td class="cell"><span>{{$papel->descripcion}}</span></td>
                                                <td class="cell"><span class="truncate">{{$papel->cantidad}}</span></td>
                                                <td class="cell"><span class="truncate">{{$papel->solicitante}}</span></td>
                                                <td class="cell"><span class="truncate">{{$papel->fecha}}</span></td>
                                                <td class="cell"><span class="truncate">{{$papel->observaciones}}</span></td>
                                
                                               @switch($papel->estado)
                                                   @case('Solicitado')
                                                       <td class="cell"><span class="badge bg-warning">Solicitado</span></td>
                                                       @break
                                                   @case('Entregado')
                                                       <td class="cell"><span class="badge bg-success">Entregado</span></td>
                                                       @break
                                                   @default    
                                               @endswitch
                                             
                                               
                                                <td class="cell">
                                                    <a href="{{route('editar_papeleria_view', $papel->id)}}" class="btn-sm  btn_icon info" style="padding:0.5rem;"><i class="bi bi-pencil"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->                           
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->

                    <script>
                        var $rows = $('#table_solped tr');
                        $('#input_buscar').keyup(function() {
                            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                            
                            $rows.show().filter(function() {
                                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                                return !~text.indexOf(val);
                            }).hide();
                        });
                    </script>

                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                            </li>
                        </ul>
                    </nav><!--//app-pagination-->
                </div><!--//tab-pane-->
            </div><!--//tab-content-->
@endsection