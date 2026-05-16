<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adopcion extends Model
{
    use HasFactory;

    /**
     * Atributos asignables (Mass Assignment).
     */
    protected $fillable = [
        'campo_1',
        'campo_2',
    ];

    /**
     * Atributos ocultos en serialización (JSON/API).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversión de tipos automática.
     */
    protected $casts = [
        'fecha_publicacion' => 'datetime',
        'es_activo' => 'boolean',
        'precio' => 'decimal:2',
    ];





    //relaciones

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
