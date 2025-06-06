<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

class Piece extends Model
{
    use HasFactory, WithRolePermissions;

    /**
     * La tabla asociada al modelo.
     * @var string
     */
    protected $table = 'pieces';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'name',
        'category',
        'price',
        'description',
        'attributes',
        'stock',
        'used_materials',
        'dimensions',
        'unit',
        'weight',
        'involved_processes',
        'image_url',
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
        'sku' => 'string',
        'name' => 'string',
        'category' => 'string',
        'price' => 'decimal:2',
        'description' => 'string',
        'attributes' => 'array',
        'stock' => 'integer',
        'used_materials' => 'array',
        'dimensions' => 'array',
        'unit' => 'string',
        'weight' => 'decimal:2',
        'involved_processes' => 'array',
        'image_url' => 'string',
    ];

    /**
     * Relaciones con otros modelos.
     */

    // Relación con Material (N:M)
    public function materiales(): BelongsToMany {
        return $this->belongsToMany(Material::class)
            ->withPivot('piece_stock');
    }

    // Relación con Proceso (N:M)
    public function procesos(): BelongsToMany {
        return $this->belongsToMany(Proceso::class)
            ->withPivot('process');
    }

    // Otros métodos y relaciones...
}
