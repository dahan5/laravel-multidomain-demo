<?php

namespace App\Core\Actions\App;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Lorisleiva\Actions\Concerns\AsAction;

class InstallApp
{
    use AsAction;

    public string $commandSignature = 'app:install';

    public string $commandDescription = 'Initializes the application';

    public function handle(): void
    {
        $this
            ->runMigrations()
            ->runSeeders();
    }

    public function asCommand(Command $command): void
    {
        $this->handle();

        $command->info('Application is ready.');
    }

    protected function runMigrations(): self
    {
        Artisan::call('migrate --path=database/migrations/landlord --database=landlord');

        return $this;
    }

    protected function runSeeders(): self
    {
        Artisan::call('db:seed');

        return $this;
    }
}
