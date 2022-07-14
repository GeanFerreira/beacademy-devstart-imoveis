<?php

namespace Database\Seeders;

use App\Models\Neighborhood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NeighborhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Neighborhood::create(['name' => 'Academy']);
        Neighborhood::create(['name' => 'Bank']);
        Neighborhood::create(['name' => 'Fire Department']);
        Neighborhood::create(['name' => 'Movie Theater']);
        Neighborhood::create(['name' => 'Ambulatory Care']);
        Neighborhood::create(['name' => 'Mail']);
        Neighborhood::create(['name' => 'College']);
        Neighborhood::create(['name' => 'Park Station']);
        Neighborhood::create(['name' => 'Drugstore']);
        Neighborhood::create(['name' => 'Hospital']);
        Neighborhood::create(['name' => 'Bakery']);
        Neighborhood::create(['name' => 'Park']);
        Neighborhood::create(['name' => 'Bus Station']);
        Neighborhood::create(['name' => 'Cab Stand']);
        Neighborhood::create(['name' => 'Gas Station']);
        Neighborhood::create(['name' => 'Police Station']);
        Neighborhood::create(['name' => 'Restaurant']);
        Neighborhood::create(['name' => 'Shopping']);
        Neighborhood::create(['name' => 'Marketplace']);
    }
}
