@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Listado de menus</h5>
                        </div>
                        <button 
                            data-bs-toggle="modal"
                            data-bs-target="#menuModal"
                            class="btn bg-gradient-primary btn-sm mb-0">
                            +&nbsp; Nuevo menú
                        </button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        #
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Texto
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ruta
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Estado
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $key => $menu)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ ($key+1) }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $menu->texto }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $menu->ruta }}</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-sm @if($menu->state) bg-gradient-success @else bg-gradient-danger  @endif">
                                                @if($menu->state) Activo @else Inactivo @endif
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit menú">
                                                <i class="fas fa-pencil text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </td>
                                    </tr>                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal-->
    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Datos de menú</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-menu">
                        <label for="">Texto</label>
                        <input name="texto" type="text" class="form-control">
                        
                        <label for="">Url</label>
                        <input name="url" type="text" class="form-control">
    
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" checked type="checkbox">
                            <label class="form-check-label">Activo</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-primary">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                    <button type="button"
                            class="btn btn-secondary" 
                            data-bs-dismiss="modal">
                        <i class="fa fa-close"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection