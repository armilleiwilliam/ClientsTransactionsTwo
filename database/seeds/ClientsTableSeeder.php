<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 33; $i++) {
            $result = $this->DB::table('clients')->insert([ //,
                'FirstName' => $faker->name,
                'LastName' => $faker->lastName,
                'email' => $faker->unique()->email
            ]);
        }

        for ($i = 0; $i < 33; $i++) {
            $result = $this->DB::table('transactions')->insert([ //,
                'client_id' => mt_rand(1,23),
                'transaction_date' => $faker->dateTime,
                'amount' => mt_round(50,100) . '.00'
            ]);
        }
    }
}
