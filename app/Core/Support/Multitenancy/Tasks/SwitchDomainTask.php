<?php

namespace App\Core\Support\Multitenancy\Tasks;

use Foxws\MultiDomain\Facades\MultiDomain;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;

class SwitchDomainTask implements SwitchTenantTask
{
    public function makeCurrent(Tenant $tenant): void
    {
        MultiDomain::initialize($tenant->domain);
    }

    public function forgetCurrent(): void
    {
    }
}
