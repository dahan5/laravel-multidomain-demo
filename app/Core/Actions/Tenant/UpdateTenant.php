<?php

namespace App\Core\Actions\Tenant;

use App\Core\DataObjects\TenantData;
use App\Core\Models\Tenant;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\LaravelData\DataCollection;

class UpdateTenant
{
    use AsAction;

    public function handle(DataCollection|TenantData $data): DataCollection|Tenant
    {
        return $data instanceof DataCollection
            ? $data->map(fn (TenantData $item) => $this->update($item))
            : $this->update($data);
    }

    protected function update(TenantData $data): Tenant
    {
        // Update model
        $model = $this->getTenant($data);
        $model->updateOrFail($data->toArray());

        return $model;
    }

    protected function getTenant(TenantData $data): Tenant
    {
        return Tenant::findFromData($data);
    }
}
