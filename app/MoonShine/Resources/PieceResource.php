<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Piece;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Image;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

/**
 * @extends ModelResource<Piece>
 */
class PieceResource extends ModelResource
{
    use WithRolePermissions;
    protected string $model = Piece::class;

    protected string $title = 'Pieces';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name')->required(),
            Text::make('SKU', 'sku')->sortable(),
            Text::make('Category', 'category')->required(),
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
                Text::make('Name', 'name')->required(),
                Text::make('SKU', 'sku')->sortable()->nullable(),
                Text::make('Category', 'category')->required(),
                Number::make('Price', 'price')->step(0.01)->min(0)->default(0)->required(),
                Text::make('Unit', 'unit')->nullable(),
                Number::make('Stock', 'stock')->step(1)->min(0)->default(0)->nullable(),
                Number::make('Weight', 'weight')->step(0.01)->min(0)->default(0),
                Image::make('Image', 'image_url')->nullable(),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [

            Textarea::make('Description', 'description')->nullable(),
            Textarea::make('Attributes', 'attributes')->nullable(),
            Textarea::make('Used Materials', 'used_materials')->nullable(),
            Textarea::make('Dimensions', 'dimensions')->nullable(),
            Textarea::make('Involved processes', 'involved_processes')->nullable(),
        ];
    }

    /**
     * @param Piece $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'name'           => ['required', 'string', 'max:25'],
            'category'       => ['required', 'string', 'max:25'],
            'sku'            => ['nullable', 'string', 'max:25'],
            'description'    => ['nullable', 'string'],
            'attributes'     => ['nullable', 'array'],
            'price'          => ['required', 'numeric', 'min:0'],
            'unit'           => ['nullable', 'string'],
            'stock'          => ['nullable', 'numeric', 'min:0'],
            'used_materials' => ['nullable', 'array'],
            'dimensions'     => ['nullable', 'array'],
            'weight'         => ['nullable', 'numeric'],
            'involved_processes' => ['nullable', 'array'],
            'image_url'      => ['nullable', 'string'],
            
        ];
    }
}
