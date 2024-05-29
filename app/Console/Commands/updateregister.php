<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\History;

class updateregister extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The updated users';

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
        History::where('id',1)->update([

            'name'=>'french1','email'=>'test122@gmail.com','cron_time'=>now()

        ]);
    }
}
