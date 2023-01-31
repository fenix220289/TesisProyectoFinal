@extends('layouts.user_type.auth')

@section('content')
<form method="POST" action="{{ route('planes.store') }}" role="form text-left">
@csrf
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
        <div class="py-2 m-3">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ $titulo }}</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label @error('nombre') text-danger @enderror">Nombre</label>
                                <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                    @if ($plan)
                                        <input type="hidden" name="id" value="{{ $plan->id }}">
                                    @endif
                                    <input 
                                        type="text" 
                                        name="nombre"
                                        class="form-control" 
                                        placeholder="Nombre del plan" 
                                        autoComplete="off"
                                        value="@if(isset($plan)) {{ old('nombre', $plan->nombre) }} @endif">
                                </div>
                                @error('nombre')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label @error('tipo_plan') text-danger @enderror">Tipo de plan</label>
                                <div class="@error('tipo_plan') border border-danger rounded-3 @enderror">
                                    <select name="tipo_plan" class="form-control">
                                        <option value="">Seleccion un tipo de plan</option>
                                        @foreach ($tipos as $tipo)
                                            <option @if(isset($plan) && $tipo->id == $plan->tipo_plan) {{ "selected" }} @endif value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tipo_plan')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label @error('precio') text-danger @enderror">Precio</label>
                                <div class="@error('precio')border border-danger rounded-3 @enderror">
                                    <input 
                                        type="text" 
                                        name="precio"
                                        class="form-control" 
                                        placeholder="0,00" 
                                        autoComplete="off"
                                        value="@if(isset($plan)) {{ old('precio', $plan->precio) }} @endif">
                                </div>
                                @error('precio')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Estado</label>
                                <div>
                                    <div class="form-check form-switch mt-2">
                                        <input name="state" class="form-check-input" 
                                            @if(isset($plan)) 
                                                @checked(old('state', $plan->state)) 
                                            @else checked @endif
                                            type="checkbox">                                    
                                    </div>
                                </div>
                                @error('state')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Destacar</label>
                                <div>
                                    <div class="form-check form-switch mt-2">
                                        <input name="especial" class="form-check-input" 
                                                @if(isset($plan)) 
                                                    @checked(old('especial', $plan->especial)) 
                                                @else checked @endif
                                                type="checkbox">
                                    </div>
                                </div>
                                @error('especial')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-2 m-3">
            <div class="card">
                <div class="card-body pt-4 p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Característica</label>
                                <div class="border rounded-3">
                                    <select id="servicio" class="form-control">
                                        <option value="">Seleccion una característica</option>
                                        @foreach ($servicios as $servicio)
                                            <option value="{{ $servicio->id }}">{{ $servicio->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <label class="form-control-label">Agregar</label><br>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addDetalle()"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-2 m-3">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Detalles del plan</h6>
                </div>
                <div class="card-body pt-4 p-3">
                <div class="table-responsive p-0">
                    <table id="table-detalles-plan" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descripción</th>
                                <th class="text-end text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include("dashboard.planes.detalles")
                        </tbody>
                    </table>
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

    const addDetalle = () => {

        var obj = document.getElementsByTagName("tbody")[0];
        var select = document.getElementById("servicio");

        if(select.value > 0){

            var descripcion = select.options[select.selectedIndex].text;
            var primeraFilaClase = document.getElementsByTagName("tr")[1].classList[0];

            if(primeraFilaClase == "alert"){
                //Borro el contenido
                document.getElementsByTagName("tbody")[0].innerHTML = ""
            }

            var contador = [(document.getElementsByTagName("tr").length)];

            var row ="  <td>";
            row +="         <input type='hidden' name='servicios[]' value='"+select.value+"'>";
            row +="         <p class='text-xs font-weight-bold mb-0'>"+(contador)+"</p>";
            row +="     </td>";
            row +="     <td class='ps-4'>";
            row +="         <p class='text-xs font-weight-bold mb-0'>"+descripcion+"</p>";
            row +="     </td>";
            row +="     <td class='ps-4'>";
            row +="         <p class='text-xs text-end font-weight-bold mb-0'>";
            row +="             <span onclick='deleteFila("+contador+")'>";
            row +="                 <i class='cursor-pointer fas fa-trash text-secondary'></i>";
            row +="             </span>";
            row +="         </p>";
            row +="     </td>";

            document.getElementById('table-detalles-plan').insertRow(-1).innerHTML = row

        }else{
            alert("Debe seleccionar una característica válida");
        }
    }

    const deleteFila = (numeroFila) => {
        document.getElementsByTagName("tr")[(numeroFila-1)].remove();
    }

</script>