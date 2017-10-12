<?php

use Illuminate\Database\Seeder;

class FrontblocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Frontblock::create([
            'name' => 'default',
            'articles' => '1,2,3,4,5',
            'rows' => 3,
            'columns' => [3,8]
        ]);
    }
}
