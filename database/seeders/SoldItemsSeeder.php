<?php

namespace Database\Seeders;

use App\Models\SoldItems;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoldItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoldItems::factory(10)->create();

    }
}
