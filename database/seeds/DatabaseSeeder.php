<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Post::class, 50)->create();
        factory(App\Category::class, 50)->create();
        factory(App\User::class, 50)->create();
    }
}
