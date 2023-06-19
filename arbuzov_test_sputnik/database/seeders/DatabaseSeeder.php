<?php

namespace Database\Seeders;

use App\Models\Resort;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Resort::factory(15)->create();
    }
}
