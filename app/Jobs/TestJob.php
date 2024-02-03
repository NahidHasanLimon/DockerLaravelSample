<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $name = 'job_'.substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,4);
         for($i = 0 ; $i< 2; $i ++){
            sleep(10);
            User::create([
                'name' => $name,
                'email' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,3).'@gmail.com',
                'password' => Hash::make('password'),
            ]);
         };
    }
}
