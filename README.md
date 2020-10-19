## Laravel project

Application send subscribers email to Mailchimp.
To install project follow next steps:

- Clone repository.
- Run `composer install`.
- Add your credential to `.env` (Mailchimp id, Mailchimp list id, database login + password)
- Run `php artisan migrate --seed` to migrate tables and fill tables with fake data. Default user is admin@gmail.com (password: 123456789)
- Run `php artisan serve` to run application.

Application has two console commands:
1) `php artisan mailchimp:send-subscribers` - this command send all users to Mailchimp. This command work every 30 minutes - this done by adding command to `Kernel.php`.
2) `php artisan mailchimp:set-mailing-status {status}` status can be true|false|1|0. Command set new mailing status to subscribers.
