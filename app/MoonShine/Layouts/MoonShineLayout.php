<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\MenuManager\MenuItem;
use MoonShine\MenuManager\MenuGroup;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\PermissionResource;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use App\MoonShine\Resources\PiezaResource;
use App\MoonShine\Resources\PieceResource;
use App\MoonShine\Resources\MaterialResource;
use App\MoonShine\Resources\SupplierResource;
use App\MoonShine\Resources\ProcessResource;
use App\MoonShine\Resources\SalesOrderResource;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make('System',[
                MenuItem::make('Admins',  UserResource::class),
                MenuItem::make('Roles',  RoleResource::class),
                MenuItem::make('Permisos',  PermissionResource::class)
        ]),
            MenuItem::make('Pieces', PieceResource::class),
            MenuItem::make('Materials', MaterialResource::class),
            MenuItem::make('Suppliers', SupplierResource::class),
            MenuItem::make('Processes', ProcessResource::class),
            MenuItem::make('SalesOrders', SalesOrderResource::class),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
