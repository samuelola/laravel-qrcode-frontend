<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\History;

class HistoryCom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sam:histo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is an history test';

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

            'name'=>'sammyola','email'=>'sammyola122@gmail.com','cron_time'=>now()

        ]); 
    }
}
