<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;

use App\Mail\NewUserNotification;


use App\Notifications\NotifyInactiveUser;

class EmailInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email inactive users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //create a new invite record
            $data = 'My testing';

            // send the email
            Mail::to('oladelesamuel48@gmail.com')->send(new NewUserNotification($data));

            $this->info('email sent successfully!');
    }
}
