<?php

use App\Core\Models\Tenant;
use Foxws\MultiDomain\Domains\Domain\MultiDomain;

if (! function_exists('current_tenant')) {
    function current_tenant(): ?Tenant
    {
        return Tenant::current();
    }
}

if (! function_exists('current_domain')) {
    function current_domain(): ?MultiDomain
    {
        return domain(
            current_tenant()?->domain
        );
    }
}
