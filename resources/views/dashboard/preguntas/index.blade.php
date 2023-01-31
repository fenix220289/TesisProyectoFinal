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
                            <h5 class="mb-0">Listado de preguntas</h5>
                        </div>
                        <a 
                            href="{{ url('dashboard/preguntas/create') }}"
                            class="btn bg-gradient-primary btn-sm mb-0">
                            +&nbsp; Nuevo pregunta
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
                                        pregunta
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
                                @foreach ($preguntas as $key => $pregunta)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ ($key+1) }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                               {{ $pregunta->pregunta }}
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-sm @if($pregunta->state) bg-gradient-success @else bg-gradient-danger  @endif">
                                                @if($pregunta->state) Activo @else Inactivo @endif
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('dashboard/preguntas/edit/'.$pregunta->id) }}" class="mx-3" 
                                                data-bs-toggle="tooltip" 
                                                data-bs-original-title="Edit pregunta">
                                                <i class="fas fa-pencil text-secondary"></i>
                                            </a>
                                            <span onclick="deleteRespuesta(<?= $pregunta->id;?>)">
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
    const deleteRespuesta = (id) => {
        if(confirm("¿Desea eliminar esta pregunta?")){
            window.location.href = "/dashboard/preguntas/delete/"+id;
        }
    }
</script>