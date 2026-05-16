<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Animal extends Model
{
    use HasFactory;

    /**
     * Atributos asignables (Mass Assignment).
     */
    protected $fillable = [
        ' nombre',
        'especie',
        'fecha_nacimiento',
        'chip'
    ];

    /**
     * Atributos ocultos en serialización (JSON/API).
     */
    protected $hidden = [];

    /**
     * Conversión de tipos automática.
     */
    protected $casts = [
        'fecha_nacimiento' => 'datetime',

    ];

    //relaciones

    public function adopcion(): HasOne
    {
        return $this->hasOne(Adopcion::class, 'animal_id');
    }
    public function revisiones(): HasMany
    {
        return $this->hasMany(Revision::class, 'animal_id');
    }
}
