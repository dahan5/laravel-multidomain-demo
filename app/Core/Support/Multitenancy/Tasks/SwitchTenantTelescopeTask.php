<?php

namespace App\Core\Support\Multitenancy\Tasks;

use Laravel\Telescope\Telescope;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;

/**
 * @doc https://spatie.be/docs/laravel-multitenancy/v2/advanced-usage/using-tenant-specific-facades
 */
class SwitchTenantTelescopeTask implements SwitchTenantTask
{
    protected ?array $originalTelescopeTagUsing;

    public function makeCurrent(Tenant $tenant): void
    {
        $this->originalTelescopeTagUsing = Telescope::$tagUsing;

        Telescope::$tagUsing = [];
        Telescope::tag(fn () => [$tenant->domain]);
    }

    public function forgetCurrent(): void
    {
        Telescope::$tagUsing = $this->originalTelescopeTagUsing;
        Telescope::tag(fn () => ['landlord']);
    }
}
