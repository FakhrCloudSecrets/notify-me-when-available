<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Task\NotifyMeWhenAvailable\Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class
        ]);
    }
}
