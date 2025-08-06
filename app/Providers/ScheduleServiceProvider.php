<?php

namespace App\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\ServiceProvider;
use App\Console\Commands\SendChallengeNotifications;


class ScheduleServiceProvider extends ServiceProvider implements ShouldQueue
{
    /**
     * Register the application's service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register the SendChallengeNotifications command
        $this->app->singleton(SendChallengeNotifications::class);
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(Schedule $schedule)
    {
        // Schedule the SendChallengeNotifications command to run every minute
        $schedule->command('challenge:notify')->everyMinute();
    }
}
