<?php

namespace Tests;

use App\Core\Models\Tenant;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use RuntimeException;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        throw_if(
            'production' === app()->environment(),
            RuntimeException::class,
            'Tests cannot be run on production.'
        );

        $this->setupDatabase();
        $this->setupTenant();
    }

    public function setupDatabase(): void
    {
        $this->artisan('migrate --path=database/migrations/landlord --database=landlord');
    }

    public function setupTenant(): void
    {
        $this->seed([
            // TenantSeeder::class,
        ]);

        Tenant::firstOrFail()->makeCurrent();
    }
}
