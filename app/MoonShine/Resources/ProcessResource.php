<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Process;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\BelongsTo;
use MoonShine\UI\Fields\Number;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

/**
 * @extends ModelResource<Process>
 */
class ProcessResource extends ModelResource
{
    use WithRolePermissions;
    protected string $model = Process::class;

    protected string $title = 'Processes';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('name')->sortable(),
            Textarea::make('description')->sortable(),
            Number::make('time_estimation')->sortable(),
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
                Textarea::make('description')->sortable(),
                Number::make('time_estimation')->sortable(),
                Number::make('material_id')->sortable(),
                /*
                BelongsTo::make('Material', 'material_id', MaterialResource::class)
                */
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
     * @param Process $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'name'           => ['required', 'string', 'max:50'],
            'description'    => ['required', 'string'],
            'time_estimation'=> ['required', 'integer'],
            // otros campos...
            'material_id'    => ['nullable', 'integer'],
        ];
    }
}
