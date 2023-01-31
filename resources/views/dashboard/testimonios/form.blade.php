@extends('layouts.user_type.auth')

@section('content')

<form method="POST" action="{{ route('testimonios.store') }}" role="form text-left" enctype="multipart/form-data">
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
                @csrf
                @if ($testimonio)
                <input name="id" type="hidden" value="{{ $testimonio->id }}">
                @endif
                <div class="card-body pt-4 p-3">
                    <div class="row">
                        <div class="col-md-2">
                            <img
                                id="imagenPrevia" 
                                src="@if(isset($testimonio) && $testimonio->foto !== '') {{ $testimonio->foto }} @else /assets/img/home-decor-1.jpg @endif"
                                style="cursor: pointer;"
                                alt="img-blur-shadow" 
                                class="img-fluid shadow border-radius-xl img-thumbnail">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Foto</label>
                                        <div class="">
                                            <input 
                                                type="file" 
                                                class="form-control" 
                                                name="foto"
                                                onchange="selectedPicture(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label @error('persona') text-danger @enderror">Persona</label>
                                        <div class="@error('persona')border border-danger rounded-3 @enderror">
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                placeholder="Nombre de la persona" 
                                                name="persona"
                                                autoComplete="off"
                                                value="@if(isset($testimonio)) {{ old('persona', $testimonio->persona) }} @endif"
                                        >
                                        </div>
                                        @error('persona')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label @error('cargo') text-danger @enderror">Ocupación</label>
                                        <div class="@error('cargo')border border-danger rounded-3 @enderror">
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                placeholder="Ocupación de la persona" 
                                                name="cargo"
                                                autoComplete="off"
                                                value="@if(isset($testimonio)) {{ old('cargo', $testimonio->cargo) }} @endif">
                                        </div>
                                        @error('cargo')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label @error('testimonio') text-danger @enderror">Testimonio</label>
                                <div class="@error('testimonio')border border-danger rounded-3 @enderror">
                                    <textarea class="form-control" name="testimonio">@if(isset($testimonio)) {{ $testimonio->testimonio }} @endif</textarea>
                                </div>
                                @error('testimonio')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
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

<script>
    const selectedPicture = (evt) => {

        var files = evt.target.files; // FileList object

        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {

            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                alert("El formato de la imagen no es compatible")
                return false;
            }

            var reader = new FileReader();

            reader.onload = (function(theFile) {

                return function(e) {
                    document.getElementById("imagenPrevia").setAttribute("src", e.target.result);
                };

            })(f);

            reader.readAsDataURL(f);
        }
    }
</script>