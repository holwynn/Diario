<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::insert([
            ['name' => 'politics'],
            ['name' => 'economy'],
            ['name' => 'finances'],
            ['name' => 'people'],
            ['name' => 'sports'],
            ['name' => 'regional'],
            ['name' => 'world'],
            ['name' => 'technology']
        ]);
    }
}
