<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the Author
        $genres = factory(App\Customer::class, 150)->create();

        $this->command->info('Customers Created!');
    }
}
