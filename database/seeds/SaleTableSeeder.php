<?php

use Illuminate\Database\Seeder;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sales
        $genres = factory(App\Sale::class, 237)->create();

        $this->command->info('Sales Created!');
    }
}
