<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSubscriptionExpiryMessage implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $customer;

    private $expiredate;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customer, $expiredate) {
        $this->customer   = $customer;
        $this->expiredate = $expiredate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {

        info('now in job');
        sendMail('emails.subscription', $this->customer->email, 'your subscription expire', $this->customer);

        //
    }
}
