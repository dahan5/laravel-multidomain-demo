<?php

namespace App\Core\Actions\App;

use App\Core\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateApp
{
    use AsAction;

    public string $commandSignature = 'app:update';

    public string $commandDescription = 'Update the application';

    public function handle(): void
    {
        $this
            ->performMigrations()
            ->setCurrentTenant();
    }

    public function asCommand(Command $command): void
    {
        $this->handle();

        $command->info('Application has been updated.');
    }

    protected function setCurrentTenant(): self
    {
        Tenant::first()->makeCurrent();

        return $this;
    }

    protected function performMigrations(): self
    {
        Artisan::call('migrate --path=database/migrations/landlord --database=landlord');

        return $this;
    }
}
