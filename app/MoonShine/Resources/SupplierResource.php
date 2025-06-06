<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

/**
 * @extends ModelResource<Supplier>
 */
class SupplierResource extends ModelResource
{
    use WithRolePermissions;
    protected string $model = Supplier::class;

    protected string $title = 'Suppliers';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('name')->sortable(),
            Text::make('contact_info')->sortable(),
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
                Text::make('name')->sortable(),
                Textarea::make('contact_info')->sortable(),
                Text::make('material_id')->sortable(),
                Text::make('sku')->sortable(),
                Text::make('payment_terms')->sortable()
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            
        ];
    }

    /**
     * @param Supplier $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'name'           => ['required', 'string', 'max:50'],
            'contact_info'   => ['required', 'string', 'max:255'],
            'material_id'    => ['nullable', 'integer'],
            'sku'            => ['required', 'string', 'max:50'],
            'payment_terms'  => ['required', 'string'],
        ];
    }
}
