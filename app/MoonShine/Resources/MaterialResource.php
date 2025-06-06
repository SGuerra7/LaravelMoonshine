<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Textarea;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

/**
 * @extends ModelResource<Material>
 */
class MaterialResource extends ModelResource
{

    use WithRolePermissions;
    protected string $model = Material::class;

    protected string $title = 'Materials';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('SKU', 'sku')->sortable(),
            Text::make('Name', 'name')->required()->sortable(),
            Text::make('Category', 'category')->required()->sortable(),
                
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('SKU', 'sku')->sortable(),
                Text::make('Name', 'name')->required()->sortable(),
                Text::make('Category', 'category')->required()->sortable(),
                /*
                BelongsTo::make('Supplier', 'supplier_id', SupplierResource::class)
                    ->required()
                    ->sortable()
                    ->searchable()
                    ->placeholder('Select a supplier'),
                    */
                Number::make('Price', 'price')->step(0.01)->min(0)->default(0)->required(),
                Text::make('Unit', 'unit')->nullable(),
                Number::make('Purchase Price', 'purchase_price')->step(1)->min(0)->default(0)->nullable(),
                Number::make('Weight', 'weight')->step(0.01)->min(0)->default(0),
                Number::make('Stock', 'stock')->step(1)->min(0)->default(0)->nullable(),
                Textarea::make('Attributes', 'attributes')->nullable(),
                Textarea::make('Description', 'description')->nullable(),
                Image::make('Image', 'image_url')->nullable(),

            ])
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            
        ];
    }

    /**
     * @param Material $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [

            'sku'            => ['nullable', 'string', 'max:25'],
            'name'           => ['required', 'string', 'max:25'],
            'category'       => ['required', 'string', 'max:25'],
            'supplier_id'    => ['nullable', 'integer'],
            'price'          => ['required', 'numeric', 'min:0', ],
            'stock'          => ['nullable', 'integer', 'min:0'],
            'unit'           => ['nullable', 'string', 'max:25'],
            'purchase_price' => ['nullable', 'integer', 'min:0'],
            'weight'         => ['nullable', 'integer', 'min:0'],
            'attributes'     => ['nullable', 'array'],
            'description'    => ['nullable', 'string', 'max:255'],
            'image_url'      => ['nullable', 'string', 'max:255'],

        ];
    }
}
