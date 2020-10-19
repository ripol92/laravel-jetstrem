<?php

namespace App\Console\Commands;

use App\Models\Subscriber;
use Illuminate\Console\Command;

class SetNewMailingStatusToSubscribers extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailchimp:set-mailing-status {status}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set new status for subscribers newsletter mailing';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $mailingStatus = filter_var($this->argument('status'), FILTER_VALIDATE_BOOLEAN);
        Subscriber::query()->where('mailing_status', '!=', $mailingStatus)
            ->update(['mailing_status' => $mailingStatus]);
        return 0;
    }
}
