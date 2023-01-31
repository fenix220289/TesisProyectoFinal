@extends('layouts.user_type.auth')

@section('content')
<form method="POST" action="{{ route('secciones.store') }}" role="form text-left">
<div class="row">
    <div class="col-lg-12">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-validate-errors :errors="$errors" class="mt-2 w-full flex flex-col gap-2 border-l-4 border-l-red-400 bg-red-50 pl-12 py-4 pr-4" />
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
                        <div class="form-group">
                            @if ($seccion)
                            <input name="id" type="hidden" value="{{ $seccion->id }}">
                            @endif
                            <label class="form-control-label @error('titulo') text-danger @enderror">Título</label>
                            <div class="@error('titulo')border border-danger rounded-3 @enderror">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="Título de la sección" 
                                    name="titulo"
                                    autoComplete="off"
                                    value="@if(isset($seccion)) {{ old('titulo', $seccion->titulo) }} @endif">
                            </div>
                            @error('titulo')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label @error('descripcion') text-danger @enderror">Descripcion</label>
                            <div class="@error('descripcion')border border-danger rounded-3 @enderror">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="Descripcion de la sección" 
                                    name="descripcion"
                                    autoComplete="off"
                                    value="@if(isset($seccion)) {{ old('descripcion', $seccion->descripcion) }} @endif">
                            </div>
                            @error('descripcion')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check form-switch mt-2">
                                <input name="state" class="form-check-input" 
                                    @if(isset($seccion)) 
                                        @checked(old('state', $seccion->state)) 
                                    @else checked @endif
                                    type="checkbox">
                                <label class="form-check-label">Activo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            @if ($seccion)
                            <input name="id" type="hidden" value="{{ $seccion->id }}">
                            @endif
                            <label class="form-control-label @error('contenido') text-danger @enderror">Contenido de la sección</label>
                            <div class="@error('contenido')border border-danger rounded-3 @enderror">
                                <textarea 
                                    id="editor"
                                    class="form-control" 
                                    placeholder="Descripción de la pregunta" 
                                    name="contenido">@if(isset($seccion)) {{ old('contenido', $seccion->contenido)  }} @endif</textarea>
                            </div>
                            @error('contenido')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror  
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