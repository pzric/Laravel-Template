<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RolSeeder::class);
      $this->call(UserSeeder::class);
    }
}
