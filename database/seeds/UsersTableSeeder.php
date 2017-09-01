<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * First, let's create an administrator user with a few articles.
         */
        $adminUser = App\User::create([
            'name' => 'mscott',
            'email' => 'mscott@news.com',
            'password' => bcrypt('secret'),
            'roles' => ['ROLE_USER', 'ROLE_WRITER', 'ROLE_EDITOR', 'ROLE_ADMIN']
        ]);

        $adminUser->profile()->create([
            'name' => 'Michael Scott',
            'description' => 'Michael Scott is the regional manager of this newspaper.'
        ]);

        $adminUser->articles()->saveMany(factory(App\Article::class, 10)->make());

        /**
         * Now let's fire up an editor without articles (the editor relationship is done in EditorsTableSeeder.php)
         */
        $editorUser = App\User::create([
            'name' => 'bstgalactica666',
            'email' => 'dwight@news.com',
            'password' => bcrypt(''),
            'roles' => ['ROLE_USER', 'ROLE_WRITER', 'ROLE_EDITOR']
        ]);

        $editorUser->profile()->create([
            'name' => 'Dwight K. Schrute',
            'description' => 'Dwigth is the assistant to the regional manager of this newspaper. He is also a karate blue belt and owner of a Schrute Farms.'
        ]);

        /**
         * Three random writers with articles
         */
        factory(App\User::class, 3)->create(['roles' => ['ROLE_USER', 'ROLE_WRTIER']])
            ->each(function($u) {
                $u->profile()->save(factory(App\Profile::class)->make());
                $u->articles()->saveMany(factory(App\Article::class, 10)->make());
            });

        /**
         * Finally, some random default users
         */
        factory(App\User::class, 10)->create()
            ->each(function($u) {
                $u->profile()->save(factory(App\Profile::class)->make());
            });
    }
}
