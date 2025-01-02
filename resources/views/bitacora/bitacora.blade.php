@extends('layout.nav')
@section('title', 'Departamentos')
@section('content')

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Bitácora</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Buscar">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Buscar</button>
                            </div>
                        </form>    
                    </div><!--//col-->

                    <div class="col-auto">       
                        <select class="form-select w-auto" >
                              <option selected value="option-1">Todos</option>
                              <option value="option-2">Esta Semana</option>
                              <option value="option-3">Este Mes</option>
                              <option value="option-4">Ultimos 3 mses</option>   
                        </select>
                    </div>

                    <div class="col-auto">						    
                        <button class="btn app-btn-secondary" type="button" id="editar" data-bs-toggle="modal" data-bs-target="#agregarModal">
                            <svg class="w-4 h-4 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 25 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Nuevo Evento
                        </button>
                    </div>

                    <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Evento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="settings-form" action="{{route('agregar_bitacora')}}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="modal-body"> 
                                    <div class="row">
                                        <div class="col">
                                            <label for="setting-input-2" class="form-label">Fecha inicio</label>
                                            <input type="datetime-local" name="fecha_inicio" value="<?php echo date("Y-m-d H:i:s");?>" class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <label for="setting-input-2" class="form-label">Fecha fin</label>
                                            <input type="datetime-local" name="fecha_fin" value="<?php echo date("Y-m-d H:i:s");?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="setting-input-2" class="form-label">Departamento / Área</label>
                                            <select name="departamento" class="form-select" required>
                                                <option value="">Elige...</option>
                                                @foreach($departamentos as $departamento)
                                                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="setting-input-2" class="form-label">Atendio</label>
                                            <select name="atendido" class="form-select" required>
                                                <option value="">Elige...</option>
                                                @foreach ($usuarios as $usuario)
                                                    <option value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellidoPaterno}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="message-text" class="col-form-label">Estado</label>
                                            <select name="estado" class="form-select" required>
                                                <option value="" selected>Elige...</option>
                                                <option value="1">Pendiente</option>
                                                <option value="2">Terminado</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label for="message-text" class="col-form-label">Nivel de riesgo</label>
                                            <select name="amenaza" class="form-select" required>
                                                <option value="" selected>Elige...</option>
                                                <option value="1">Bajo</option>
                                                <option value="2">Medio</option>
                                                <option value="3">Critico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Descripción del evento</label>
                                        <textarea style="min-height: 4rem;" name="descripcion_evento" class="form-control" id="message-text"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Descripción de la solición</label>
                                        <textarea style="min-height: 4rem;" name="descripcion_solucion" class="form-control" id="message-text"></textarea>
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
           
            
{{--     <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
        <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Todos</a>
        <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
        <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pendientes</a>
        <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelados</a>
    </nav> --}}
            
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Atendio</th>
                                            <th class="cell">Departamento / Área</th>
                                            <th class="cell">Descripcion Evento</th>
                                            <th class="cell">Estado</th>
                                            <th class="cell">Fecha</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php $i=1; ?>
                                        @foreach($bitacoras as $bitacora)
                                            <tr>
                                                <td class="cell">{{$i}}</td>
                                                <td class="cell"><span>{{$bitacora->usuario->nombre}}</span><span class="note">{{$bitacora->usuario->apellidoPaterno}} {{$bitacora->usuario->apellidoMaterno}}</span></td>
                                                <td class="cell"><span class="truncate">{{$bitacora->departamento->nombre}}</span></td>
                                                <td class="cell"><span class="truncate">{{$bitacora->descripcion_evento}}</span></td>
                                                @if($bitacora->estado == 1)
                                                    <td class="cell"><span class="badge bg-danger">Pendiente</span></td>
                                                @else
                                                    <td class="cell"><span class="badge bg-success">Terminado</span></td>
                                                @endif
                                                <?php $fecha = date("d/m/y H:i:s", strtotime($bitacora->fecha_inicio)); ?>
                                                <td class="cell"><span class="truncate">{{$fecha}}</span></td>
                                                <td class="cell">
                                                    <a href="{{route('editar_bitacora_view', $bitacora->id)}}" class="btn-sm  btn_icon info" style="padding:0.5rem;"><i class="bi bi-pencil"></i></a>
                                                    <a href="{{route('detalles_bitacora_view', $bitacora->id)}}" class="btn-sm  btn_icon warning" style="padding:0.5rem;"><i class="bi bi-eye"></i></a>
                                                   {{--  <a href="#" class="btn-sm  btn_icon info" style="padding:0.5rem;"><i class="bi bi-pencil"></i></a> --}}
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                            @if(isset($bitac))

                            <script style="text/javascript">
                                 $(document).ready(function(){
                                    $("#editarModal").modal('show');
                                });  
                            </script>
                           
                                <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Evento</h5>
                                            <button type="button" onclick="window.location='{{url('/bitacora')}}'" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="settings-form" action="{{route('editar_bitacora', ['id' => $bitac->id])}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body"> 
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="setting-input-2" class="form-label">Fecha inicio</label>
                                                        <input type="datetime-local" name="fecha_inicio" value="{{$bitac->fecha_inicio}}" class="form-control" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="setting-input-2" class="form-label">Fecha fin</label>
                                                        <input type="datetime-local" name="fecha_fin" value="{{$bitac->fecha_fin}}" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="setting-input-2" class="form-label">Departamento / Área</label>
                                                        <select name="departamento" class="form-select" required>
                                                            <option value="{{$bitac->id_area_atendida}}" selected>{{$bitac->departamento->nombre}}</option>
                                                            @foreach($departamentos_excluido as $departamento_excluido)
                                                                <option value="{{$departamento_excluido->id}}">{{$departamento_excluido->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="setting-input-2" class="form-label">Atendio</label>
                                                        <select name="atendido" class="form-select" required>
                                                            <option value="{{$bitac->id_usuario_atiende}}" selected>{{$bitac->usuario->nombre}} {{$bitac->usuario->apellidoPaterno}}</option>
                                                            @foreach ($usuarios_excluido as $usuario_excluido)
                                                                <option value="{{$usuario_excluido->id}}">{{$usuario_excluido->nombre}} {{$usuario_excluido->apellidoPaterno}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="message-text" class="col-form-label">Estado</label>
                                                        <select name="estado" class="form-select" required>
                                                            @if($bitac->estado == 1)
                                                                <option value="1" selected>Pendiente</option>
                                                                <option value="2">Terminado</option>
                                                            @else
                                                                <option value="1" >Pendiente</option>
                                                                <option value="2" selected>Terminado</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="message-text" class="col-form-label">Nivel de riesgo</label>
                                                        <select name="amenaza" class="form-select" required>
                                                            @if($bitac->amenaza == 1)
                                                                <option value="1" selected>Bajo</option>
                                                                <option value="2">Medio</option>
                                                                <option value="3">Critico</option>
                                                            @else
                                                                @if($bitac->amenaza == 2)
                                                                    <option value="2" selected>Medio</option>
                                                                    <option value="1">Bajo</option>
                                                                    <option value="3">Critico</option>
                                                                @else
                                                                    <option value="3" selected>Critico</option>
                                                                    <option value="1">Bajo</option>
                                                                    <option value="2">Medio</option>
                                                                @endif
                                                            @endif
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Descripción del evento</label>
                                                    <textarea style="min-height: 4rem;" name="descripcion_evento" class="form-control" id="message-text">{{$bitac->descripcion_evento}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Descripción de la solición</label>
                                                    <textarea style="min-height: 4rem;" name="descripcion_solucion" class="form-control" id="message-text">{{$bitac->descripcion_solucion}}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" onclick="window.location='{{url('/bitacora')}}'" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary" style="color:white;">Actualizar Registro</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div> 
                            @endif



                            @if(isset($bitacora_detalles))
                                <script style="text/javascript">
                                    $(document).ready(function(){
                                        $("#detallesModal").modal('show');
                                    });  
                                </script>
                            
                                    <div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalles del evento</h5>
                                                <button type="button" onclick="window.location='{{url('/bitacora')}}'" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body"> 
                                                    <div>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">Atendido</th>
                                                                <th scope="col">Departamento</th>
                                                                <th scope="col">Descripción del evento</th>
                                                                <th scope="col">Descripción de la solución</th>
                                                                <th scope="col">Estado</th>
                                                                <th scope="col">Fecha</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{$bitacora_detalles->usuario->nombre}}</td>
                                                                    <td>{{$bitacora_detalles->departamento->nombre}}</td>
                                                                    <td>{{$bitacora_detalles->descripcion_evento}}</td>
                                                                    <td>{{$bitacora_detalles->descripcion_solucion}}</td>
                                                                    @if($bitacora_detalles->estado == 1)
                                                                        <td><span class="badge bg-danger">Pendiente</span></td>
                                                                    @else
                                                                        <td><span class="badge bg-success">Terminado</span></td>
                                                                    @endif
                                                                    <td>{{$bitacora_detalles->created_at}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" onclick="window.location='{{url('/bitacora')}}'" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                            @endif
                           
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->
                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav><!--//app-pagination-->
                    
                </div><!--//tab-pane-->
                
                <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                    <div class="app-card app-card-orders-table mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                
                                <table class="table mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Order</th>
                                            <th class="cell">Product</th>
                                            <th class="cell">Customer</th>
                                            <th class="cell">Date</th>
                                            <th class="cell">Status</th>
                                            <th class="cell">Total</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cell">#15346</td>
                                            <td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget volutpat erat</span></td>
                                            <td class="cell">John Sanders</td>
                                            <td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell">$259.35</td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="cell">#15344</td>
                                            <td class="cell"><span class="truncate">Pellentesque diam imperdiet</span></td>
                                            <td class="cell">Teresa Holland</td>
                                            <td class="cell"><span class="cell-data">16 Oct</span><span class="note">01:16 AM</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell">$123.00</td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="cell">#15343</td>
                                            <td class="cell"><span class="truncate">Vestibulum a accumsan lectus sed mollis ipsum</span></td>
                                            <td class="cell">Jayden Massey</td>
                                            <td class="cell"><span class="cell-data">15 Oct</span><span class="note">8:07 PM</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell">$199.00</td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                    
                                        
                                        <tr>
                                            <td class="cell">#15341</td>
                                            <td class="cell"><span class="truncate">Morbi vulputate lacinia neque et sollicitudin</span></td>
                                            <td class="cell">Raymond Atkins</td>
                                            <td class="cell"><span class="cell-data">11 Oct</span><span class="note">11:18 AM</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell">$678.26</td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
    
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->
                </div><!--//tab-pane-->
                
                <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
                    <div class="app-card app-card-orders-table mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Order</th>
                                            <th class="cell">Product</th>
                                            <th class="cell">Customer</th>
                                            <th class="cell">Date</th>
                                            <th class="cell">Status</th>
                                            <th class="cell">Total</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cell">#15345</td>
                                            <td class="cell"><span class="truncate">Consectetur adipiscing elit</span></td>
                                            <td class="cell">Dylan Ambrose</td>
                                            <td class="cell"><span class="cell-data">16 Oct</span><span class="note">03:16 AM</span></td>
                                            <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                            <td class="cell">$96.20</td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->
                </div><!--//tab-pane-->
                <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
                    <div class="app-card app-card-orders-table mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Order</th>
                                            <th class="cell">Product</th>
                                            <th class="cell">Customer</th>
                                            <th class="cell">Date</th>
                                            <th class="cell">Status</th>
                                            <th class="cell">Total</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td class="cell">#15342</td>
                                            <td class="cell"><span class="truncate">Justo feugiat neque</span></td>
                                            <td class="cell">Reina Brooks</td>
                                            <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td>
                                            <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                                            <td class="cell">$59.00</td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->
                </div><!--//tab-pane-->
            </div><!--//tab-content-->
@endsection