@extends('layouts.user_type.auth')

@section('content')
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
        <form method="POST" action="{{ route('empresa.store') }}" role="form text-left">
            <div class="py-2 m-3">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Datos básicos</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label @error('nombre') text-danger @enderror">Nombre de la empresa</label>
                                    <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Nombre" 
                                            name="nombre"
                                            autoComplete="off"
                                            value="{{ $empresa->nombre }}">
                                    </div>
                                    @error('nombre')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label @error('correo_electronico') text-danger @enderror">Descripción</label>
                                    <div class="@error('descripcion') border border-danger rounded-3 @enderror">
                                        <input 
                                            type="text"
                                            class="form-control" 
                                            placeholder="Descripción" 
                                            name="descripcion"
                                            autoComplete="off"
                                            value="{{ $empresa->descripcion }}">
                                    </div>
                                    @error('descripcion')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label @error('correo_electronico') text-danger @enderror">Correo electrónico</label>
                                    <div class="@error('correo_electronico') border border-danger rounded-3 @enderror">
                                        <input 
                                            type="text"
                                            class="form-control" 
                                            placeholder="ejemplo@dominio.com" 
                                            name="correo_electronico"
                                            autoComplete="off"
                                            value="{{ $empresa->correo_electronico }}">
                                    </div>
                                    @error('correo_electronico')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label @error('telefono') text-danger @enderror">Teléfono</label>
                                    <div class="@error('telefono')border border-danger rounded-3 @enderror">
                                        <input 
                                            type="text"
                                            class="form-control" 
                                            placeholder="40770888444" 
                                            name="telefono" 
                                            autoComplete="off"
                                            value="{{ $empresa->telefono }}">
                                    </div>
                                    @error('telefono')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label @error('direccion') text-danger @enderror">Dirección</label>
                                    <div class="@error('direccion')border border-danger rounded-3 @enderror">
                                        <input 
                                            type="text"
                                            class="form-control" 
                                            placeholder="Dirección " 
                                            name="direccion" 
                                            value="{{ $empresa->direccion }}"
                                            autoComplete="off">
                                    </div>
                                    @error('direccion')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-4 m-3">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Redes sociales</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Instagram</label>
                                    <div class="@error('instagram')border border-danger rounded-3 @enderror">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Instagram" 
                                            name="instagram"
                                            autoComplete="off"
                                            value="{{ $empresa->instagram }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Facebook</label>
                                    <div class="@error('facebook') border border-danger rounded-3 @enderror">
                                        <input 
                                            type="text"
                                            class="form-control" 
                                            placeholder="Facebook" 
                                            name="facebook"
                                            autoComplete="off"
                                            value="{{ $empresa->facebook }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Twitter</label>
                                    <div class="@error('twitter')border border-danger rounded-3 @enderror">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Twitter" 
                                            name="twitter"
                                            autoComplete="off"
                                            value="{{ $empresa->twitter }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Youtube</label>
                                    <div class="@error('youtube') border border-danger rounded-3 @enderror">
                                        <input 
                                            type="text"
                                            class="form-control" 
                                            placeholder="Youtube" 
                                            name="youtube"
                                            autoComplete="off"
                                            value="{{ $empresa->youtube }}">
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
    </div>
</div>
@endsection
