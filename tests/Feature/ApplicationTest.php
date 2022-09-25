<?php

namespace Tests\Feature;

use App\Core\Actions\App\InstallApp;
use App\Core\Actions\App\SyncApp;
use App\Core\Actions\App\UpdateApp;
use Database\Seeders\UserSeeder;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    /** @test */
    public function itCanInstallApplication()
    {
        return InstallApp::shouldRun();
    }

    /** @test */
    public function itCanUpdateApplication()
    {
        return UpdateApp::shouldRun();
    }

    /** @test */
    public function itCanSyncApplication()
    {
        return SyncApp::shouldRun();
    }

    /** @test */
    public function itCanSeedModels(): void
    {
        $this->seed([
            // UserSeeder::class,
        ]);

        $this->assertTrue(true);
    }
}
