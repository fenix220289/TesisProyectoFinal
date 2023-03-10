@props(['message'])

@if ($message)
<div class="m-3 alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
    <span class="alert-text text-white">{{ session('message') }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </button>
</div>
@endif