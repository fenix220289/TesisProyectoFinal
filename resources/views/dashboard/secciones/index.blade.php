@extends('layouts.user_type.auth')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (Session::get('message'))
                    <x-message-success :message="Session::get('message')" class="mt-2 w-full flex flex-col gap-2 border-l-4 border-l-red-400 bg-red-50 pl-12 py-4 pr-4" />
                @endif
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="mb-0">Listado de secciones</h5>
                    </div>
                    <a 
                        href="{{ url('dashboard/secciones/create') }}"
                        class="btn bg-gradient-primary btn-sm mb-0">
                        +&nbsp; Nuevo sección
                    </a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 mt-4">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    #
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Título
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Descripción
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
                            @foreach ($secciones as $key => $seccion)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ ($key+1) }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $seccion->titulo }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?= substr($seccion->descripcion,0,25);?>...
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-sm @if($seccion->state) bg-gradient-success @else bg-gradient-danger  @endif">
                                            @if($seccion->state) Activo @else Inactivo @endif
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('dashboard/secciones/edit/'.$seccion->id) }}" class="mx-3" 
                                            data-bs-toggle="tooltip" 
                                            data-bs-original-title="Edit sección">
                                            <i class="fas fa-pencil text-secondary"></i>
                                        </a>
                                        <span onclick="deleteSeccion(<?= $seccion->id;?>)">
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
@endsection
<script>
    const deleteSeccion = (id) => {
        if(confirm("¿Desea eliminar esta sección?")){
            window.location.href = "/dashboard/secciones/delete/"+id;
        }
    }
</script>