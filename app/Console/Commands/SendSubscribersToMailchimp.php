<?php

namespace App\Console\Commands;

use App\Models\Subscriber;
use Illuminate\Console\Command;
use Spatie\Newsletter\Newsletter;

class SendSubscribersToMailchimp extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
        protected $signature = 'mailchimp:send-subscribers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command get users that subscribed to newsletter and send them to Mailchimp';
    /**
     * @var Newsletter
     */
    private $newsletter;

    /**
     * Create a new command instance.
     *
     * @param Newsletter $newsletter
     */
    public function __construct(Newsletter $newsletter) {
        parent::__construct();
        $this->newsletter = $newsletter;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $subscribers = Subscriber::all();
        foreach ($subscribers as $subscriber) {
            if (! $this->newsletter->isSubscribed($subscriber->email)) {
                $this->newsletter->subscribe($subscriber->email, [
                    'FNAME'=> $subscriber->first_name, 'LNAME'=> $subscriber->last_name
                ]);
            }
        }
        return 0;
    }
}
