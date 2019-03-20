<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call(CustomerTableSeeder::class);
        $this->call(PackageTableSeeder::class);
        $this->call(SaleTableSeeder::class);

        $this->command->info("Database seeded.");

        // Re Guard model
        Eloquent::reguard();
    }
}
