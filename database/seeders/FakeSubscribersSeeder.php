<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class FakeSubscribersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakeSubs = $this->makeFakeSubscribers();
        Subscriber::query()->insert($fakeSubs);
    }

    private function makeFakeSubscribers() {
        $fakeSubs = [];
        $faker = Factory::create('ru');
        for ($i = 0; $i <= 10; $i++) {
            $fakeSubs[] = [
                'first_name' => $faker->name,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'mailing_status' => false, // due to the task request
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ];
        }
        return $fakeSubs;
    }
}
