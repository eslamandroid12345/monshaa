<?php

namespace App\Console;

use App\Console\Commands\ExpireCompanies;
use App\Console\Commands\TenantContractsExpired;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [TenantContractsExpired::class,ExpireCompanies::class];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('contracts:expired')->everyMinute();
         $schedule->command('expire:companies')->everyMinute();
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
