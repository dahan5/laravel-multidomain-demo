<?php

namespace App\Core\Actions\Tenant;

use App\Core\Models\Tenant;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteTenant
{
    use AsAction;

    public function handle(Tenant $tenant): void
    {
        $tenant->deleteOrFail();
    }
}
