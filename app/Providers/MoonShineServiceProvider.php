<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use Sweet1s\MoonshineRBAC\Resource\PermissionResource;
use Sweet1s\MoonshineRBAC\Resource\RoleResource;
use Sweet1s\MoonshineRBAC\Resource\UserResource;
use App\MoonShine\Resources\PiezaResource;
use App\MoonShine\Resources\PieceResource;
use App\MoonShine\Resources\MaterialResource;
use App\MoonShine\Resources\SupplierResource;
use App\MoonShine\Resources\ProcessResource;
use App\MoonShine\Resources\SalesOrderResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                UserResource::class,
                RoleResource::class,
                PermissionResource::class,
                PieceResource::class,
                MaterialResource::class,
                SupplierResource::class,
                ProcessResource::class,
                SalesOrderResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
