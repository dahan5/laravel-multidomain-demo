<?php

namespace App\Core\Actions\Tenant;

use App\Core\DataObjects\TenantData;
use App\Core\Models\Tenant;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\LaravelData\DataCollection;

class CreateTenant
{
    use AsAction;

    public function handle(DataCollection|TenantData $data): DataCollection|Tenant
    {
        return $data instanceof DataCollection
            ? $data->map(fn (TenantData $item) => $this->firstOrCreate($item))
            : $this->firstOrCreate($data);
    }

    protected function firstOrCreate(TenantData $data): Tenant
    {
        return Tenant::firstOrCreate(
            ['domain' => $data->domain],
            $data->toArray(),
        );
    }
}
