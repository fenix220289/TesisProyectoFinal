<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanesDetalles extends Model
{
    use HasFactory;

    protected $table = "planes_detalles";

    /**
     * Get the post that owns the comment.
     */
    public function plan()
    {
        return $this->belongsTo(Planes::class, 'plan_id');
    }
    
    /**
     * Get the post that owns the comment.
     */
    public function servicio()
    {
        return $this->belongsTo(Servicios::class, 'servicio_beneficio_id');
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
