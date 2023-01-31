@extends('layouts.user_type.auth')

@section('content')
<form method="POST" action="{{ route('mensajes.update') }}">
<div class="row">
    <div class="col-lg-12">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-message-success :message="Session::get('message')" class="mt-2 w-full flex flex-col gap-2 border-l-4 border-l-red-400 bg-red-50 pl-12 py-4 pr-4" />
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card m-3">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ $titulo }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h5>Detetalles del Mensaje</h5>
                        <hr>
                        <ul style="list-style: none;">
                            <li><b>Nombre:</b> {{ $mensaje->nombre }}</li>
                            <li><b>Contacto:</b> {{ $mensaje->contacto }}</li>
                            <li><b>Asunto:</b> {{ $mensaje->asunto }}</li>
                            <li><b>Mensaje:</b><br> {{ $mensaje->mensaje }}</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        @if ($mensaje)
                        <input name="id" type="hidden" value="{{ $mensaje->id }}">
                        @endif
                        <div class="form-check form-switch mt-2">
                            <input name="state" class="form-check-input" 
                                @if(isset($mensaje)) 
                                    @checked(old('state', $mensaje->state)) 
                                @else checked @endif
                                type="checkbox">
                            <label class="form-check-label">Leído</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn bg-primary btn-md mt-4 mb-4 text-white">
            <i class="fa fa-save"></i> Guardar
        </button>
        <button type="refresh" class="btn bg-default btn-md mt-4 mb-4">
            <i class="fa fa-refresh"></i> Cancelar
        </button>
    </div>
</form>
@endsection