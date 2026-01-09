<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $houses = \App\Models\House::all();

        // Create 10 tenants and randomly assign them to houses
        \App\Models\Tenant::factory()->count(10)->create()->each(function ($tenant) use ($houses) {
            $tenant->house_id = $houses->random()->id;
            $tenant->save();
        });
    }
}
