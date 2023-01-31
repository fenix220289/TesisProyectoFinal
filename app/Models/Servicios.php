<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $table = "servicios_beneficios";

    /**
     * Get the planes for the blog post.
     */
    public function planes()
    {
        return $this->hasMany(PlanesDetalles::class, 'servicio_beneficio_id');
    }
}
