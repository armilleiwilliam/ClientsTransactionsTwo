<?php

use Illuminate\Database\Seeder;

class ClientsTransactionsTableSeeder extends Seeder
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
            DB::table('clients')->insert([ // clients fake data
                'FirstName' => $faker->name,
                'LastName' => $faker->lastName,
                'email' => $faker->unique()->email
            ]);
        }

        for ($i = 0; $i < 33; $i++) {
            DB::table('transactions')->insert([ // transactions fake data
                'client_id' => mt_rand(1,23),
                'transaction_date' => $faker->dateTime,
                'amount' => mt_rand(50,100) . '.00'
            ]);
        }
    }
}
