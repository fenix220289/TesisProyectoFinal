@props(['errors'])

@if ($errors->any())
    <div class="m-3 text-white alert alert-danger alert-dismissible fade show" role="alert">
        <div class="font-medium text-red-600">
            Algo ha salido mal, corrija los errores en los campos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    </div>
@endif