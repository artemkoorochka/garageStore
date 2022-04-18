<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory(100)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Category::factory(90)->create();
        \App\Models\ProductCategory::factory(100)->create();
    }
}
