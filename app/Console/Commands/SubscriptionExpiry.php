<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SubscriptionExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:SubscriptionExpiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check data expire';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
