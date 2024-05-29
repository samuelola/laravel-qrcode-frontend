<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        
        Commands\HappyBirthday::class,
        Commands\EmailInactiveUsers::class,
        Commands\updateregister::class,
        Commands\HourlyUpdate::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->command('sms:birthday')->daily();

        // $schedule->command('email:inactive-users')->everyMinute();

         // $schedule->command('registered:users')->everyMinute();

        //using artisan call

        // $schedule->call(function () {
               
        //    \Artisan::call('registered:users');
               
        // })->everyMinute();

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
