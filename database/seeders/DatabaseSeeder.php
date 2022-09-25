<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->callOnce([
            // TenantSeeder::class,
            // UserSeeder::class,
        ]);
    }
}
