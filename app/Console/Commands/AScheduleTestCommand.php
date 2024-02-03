<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AScheduleTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:a-schedule-test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Your Schedule task executed successfully!');
        Log::info(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,4).'_Your Schedule task executed successfully!_');
    }
}
