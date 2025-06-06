<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;

use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

class Material extends Model
{
    use HasFactory, Notifiable, WithRolePermissions;

    /**
     * La tabla asociada al modelo.
     * @var string
     */
    protected $table = 'materials';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'name',
        'category',
        'supplier_id',
        'price',
        'stock',
        'unit',
        'purchase_price',
        'weight',
        'attributes',
        'description',
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
        'name' => 'string',
        'category' => 'string',
        'sku' => 'string',
        'supplier_id' => 'integer',
        'price' => 'decimal:2',
        'stock' => 'integer',
        'unit' => 'string',
        'purchase_price' => 'integer',
        'weight' => 'integer',
        'attributes' => 'array',
        'description' => 'string',
        'image_url' => 'string',
    ];

    /**
     * Relaciones con otros modelos.
     */
    // Relación con Proveedor (N:1)
    public function supplier()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_material');
    }
}
