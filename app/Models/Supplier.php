<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Supplier extends Model
{
    use HasFactory, WithRolePermissions;

    /**
     * La tabla asociada al modelo.
     * @var string
     */
    protected $table = 'suppliers';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'contact_info',
        'material_id',
        'payment_terms',
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
        'contact_info' => 'string',
        'material_id' => 'integer',
        'payment_terms' => 'string',
        // otros campos...
    ];

    /**
     * Relaciones con otros modelos.
     */

    // Relación con Material (N:M)
    public function materiales(): BelongsToMany {
        return $this->belongsToMany(Material::class, 'supplier_material');
    }

    

}
