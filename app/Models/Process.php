<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Process extends Model
{
    use HasFactory, WithRolePermissions;

    /**
     * La tabla asociada al modelo.
     * @var string
     */
    protected $table = 'processes';
    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'time_estimation',
        'material_id',
        // otros campos...
    ];
    /**
     * Los atributos que deben ocultarse para los arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
    /**
     * Los atributos que deben convertirse a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'time_estimation' => 'integer',
        'material_id' => 'integer',
        // otros campos...
    ];
    /**
     * Relaciones con otros modelos.
     *
     * 
     */
    public function material(): BelongsToMany{
        return $this->belongsToMany(Material::class, 'material_id');
    }
}
