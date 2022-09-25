<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant
{
    use SoftDeletes;

    /**
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * @var array<int, string>
     */
    protected $visible = [];

    public static function findFromString(string $name): ?Tenant
    {
        return static::query()->firstWhere('name', $name);
    }
}
