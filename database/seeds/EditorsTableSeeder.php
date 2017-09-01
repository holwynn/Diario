<?php

use Illuminate\Database\Seeder;
use App\Editor;

class EditorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * This is the editor user we created in UsersTableSeeder
         */
        Editor::create([
            'user_id' => 2,
            'category_id' => 1
        ]);
    }
}
