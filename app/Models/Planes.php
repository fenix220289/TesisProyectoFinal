<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    use HasFactory;

    protected $table = 'planes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'tipo_plan',
        'especial',
        'precio',
        'state'
    ];

    /**
     * Get the detalles for the plan.
     */
    public function detalles()
    {
        return $this->hasMany(PlanesDetalles::class, 'plan_id');
    }
    
    /**
     * Get the tipo de pago for the plan.
     */
    public function tipoPlan()
    {
        return $this->belongsTo(TipoPlanes::class, 'tipo_plan');
    }
}
