<?php

namespace App\Console\Commands;

use App\Jobs\SendSubscriptionExpiryMessage;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SubscriptionExpiry extends Command {
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
    public function handle() {

        $expired_customers = Customer::where('subscription_end_data', '<', now())->get();

        foreach ($expired_customers as $customer) {
            $expire_date = Carbon::createFromFormat('Y-m-d', $customer->subscription_end_data)->toDateString();
            dispatch(new SendSubscriptionExpiryMessage ($customer, $expire_date));
        }
    }
}
