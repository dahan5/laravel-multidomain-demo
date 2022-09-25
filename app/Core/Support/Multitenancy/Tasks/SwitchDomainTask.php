<?php

namespace App\Core\Support\Multitenancy\Tasks;

use Foxws\MultiDomain\Facades\MultiDomain;
use Foxws\MultiDomain\Providers\DomainServiceProvider;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;

class SwitchDomainTask implements SwitchTenantTask
{
    public function makeCurrent(Tenant $tenant): void
    {
        $domains = MultiDomain::findByDomain($tenant->domain);

        foreach ($domains as $domain) {
            app(DomainServiceProvider::class, compact('domain'))
                ->registerProviders();
        }
    }

    public function forgetCurrent(): void
    {
        $domains = MultiDomain::findByDomain(
            Tenant::current()->domain
        );

        foreach ($domains as $domain) {
            app(DomainServiceProvider::class, compact('domain'))
                ->unregisterProviders();
        }
    }
}
