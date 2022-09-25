<?php

namespace App\Core\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Get the timezone that should be used by default for scheduled events.
     */
    protected function scheduleTimezone(): string
    {
        return config('app.timezone', 'UTC');
    }

    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule
            ->command('health:check')
            ->withoutOverlapping(30)
            ->everyMinute()
            ->runInBackground();

        $schedule
            ->command('health:schedule-check-heartbeat')
            ->withoutOverlapping(30)
            ->everyMinute()
            ->runInBackground();

        $schedule
            ->command('horizon:snapshot')
            ->withoutOverlapping(240)
            ->everyFiveMinutes()
            ->runInBackground();

        $schedule
            ->command('telescope:prune')
            ->withoutOverlapping()
            ->dailyAt('02:00')
            ->runInBackground();

        $schedule
            ->command('auth:clear-resets')
            ->withoutOverlapping(600)
            ->everyFifteenMinutes()
            ->runInBackground();

        $schedule
            ->command('livewire:configure-s3-upload-cleanup')
            ->withoutOverlapping()
            ->dailyAt('03:30')
            ->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
