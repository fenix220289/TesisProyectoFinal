@extends('layouts.user_type.auth')

@section('content')
<div>
    <div class="row">
        <div class="col-12">
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <x-validate-errors :errors="$errors" class="mt-2 w-full flex flex-col gap-2 border-l-4 border-l-red-400 bg-red-50 pl-12 py-4 pr-4" />
                    <x-message-success :message="Session::get('message')" class="mt-2 w-full flex flex-col gap-2 border-l-4 border-l-red-400 bg-red-50 pl-12 py-4 pr-4" />
                </div>
            </div>
            <div class="card mb-4 mx-4">
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="{{ route('cabecera.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="mb-1 @error('titulo')text-danger @enderror">
                                        Título de Cabecera
                                    </label>
                                    <div class="@error('titulo')border border-danger rounded-3 @enderror">
                                        <input type="text" name="titulo" value="{{ $cabecera->titulo }}" class="form-control" placeholder="Escriba un título">
                                    </div>
                                    @error('titulo')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="mb-1 @error('titulo')text-danger @enderror">
                                        Descripción
                                    </label>
                                    <div class="@error('descripcion')border border-danger rounded-3 @enderror">
                                        <textarea name="descripcion" class="form-control" rows="7" placeholder="Escriba un contenido/descripción">{{ $cabecera->descripcion }}</textarea>
                                    </div>
                                    @error('descripcion')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="mb-1 @error('imagen')text-danger @enderror">
                                        Imagen de fondo
                                    </label>
                                    <div class="@error('imagen')border border-danger rounded-3 @enderror">
                                        <input name="imagen" type="file" class="form-control">
                                    </div>
                                    @error('imagen')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Guardar
                                    </button>
                                    <button type="refresh" class="btn btn-default">
                                        <i class="fa fa-refresh"></i> Cancelar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection