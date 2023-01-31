<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlanes extends Model
{
    use HasFactory;

    protected $table = "tipos_planes";

    /**
     * Get the planes for the Tipo de plan.
     */
    public function planes()
    {
        return $this->hasMany(Planes::class, 'tipo_plan');
    }
}
