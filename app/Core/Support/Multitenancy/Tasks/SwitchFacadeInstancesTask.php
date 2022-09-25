<?php

namespace App\Core\Support\Multitenancy\Tasks;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Str;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;

/**
 * @doc https://spatie.be/docs/laravel-multitenancy/v2/advanced-usage/using-tenant-specific-facades
 */
class SwitchFacadeInstancesTask implements SwitchTenantTask
{
    public function makeCurrent(Tenant $tenant): void
    {
        // tenant is already current
    }

    public function forgetCurrent(): void
    {
        $this->clearFacadeInstancesInTheAppNamespace();
    }

    protected function clearFacadeInstancesInTheAppNamespace(): void
    {
        // Discovers all facades in the App namespace and clears their resolved instance:
        collect(get_declared_classes())
            ->filter(fn ($className) => is_subclass_of($className, Facade::class))
            ->filter(fn ($className) => Str::startsWith($className, 'App') || Str::startsWith($className, 'Facades\\App'))
            ->each(fn ($className) => $className::clearResolvedInstance(
                $className::getFacadeAccessor()
            ));
    }
}
