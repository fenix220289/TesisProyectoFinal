@if (isset($plan) && count($plan->detalles) > 0)
    @foreach ($plan->detalles as $key => $detalle)
        <tr>
            <td class="ps-4">
                <input type="hidden" name="servicios[]" value="{{ $detalle->servicio_beneficio_id }}">
                <p class="text-xs font-weight-bold mb-0">{{ ($key+1) }}</p>
            </td>
            <td class="ps-4">
                <p class="text-xs font-weight-bold mb-0">{{ $detalle->servicio->descripcion }}</p>
            </td>
            <td class="ps-4">
                <p class="text-xs text-end font-weight-bold mb-0">
                    <span onclick='deleteFila(<?= $key;?>)'>
                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                    </span>
                </p>
            </td>
        </tr>    
    @endforeach
@else
    <tr class="alert alert-warning text-white text-center">
        <td colspan="3">Este plan no tiene detalles agregados</td>
    </tr>
@endif