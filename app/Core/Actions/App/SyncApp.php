<?php

namespace App\Core\Actions\App;

use App\Core\Models\Tenant;
use Illuminate\Console\Command;
use Lorisleiva\Actions\Concerns\AsAction;

class SyncApp
{
    use AsAction;

    public string $commandSignature = 'app:sync';

    public string $commandDescription = 'Sync the application';

    public function handle(): void
    {
        $this
            ->setCurrentTenant();
            // ->syncModels();
    }

    public function asCommand(Command $command): void
    {
        $this->handle();

        $command->info('Application has been synced.');
    }

    protected function setCurrentTenant(): self
    {
        Tenant::first()->makeCurrent();

        return $this;
    }
}
