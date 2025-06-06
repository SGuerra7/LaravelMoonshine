<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sweet1s\MoonshineRBAC\Traits\HasMoonShineRolePermissions;
use Spatie\Permission\Models\Role as ModelRole;

class Role extends ModelRole
{
    use HasMoonShineRolePermissions;
    /**
     * La tabla asociada al modelo.
     * @var string
     */
    protected $table = 'roles';

    protected $with = ['permissions'];
}
