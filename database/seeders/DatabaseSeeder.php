<?php

namespace Database\Seeders;

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
        $this->call([
//            UserSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            // ProductSeeder::class,
        ]);
        // \App\Models\User::factory(20)->create();
        // \App\Models\Product::factory(100)->create();
        // \App\Models\Review::factory(500)->create();
        // \App\Models\Comment::factory(200)->create();
        // \App\Models\Favorite::factory(100)->create();
        // \App\Models\BadComment::factory(100)->create();
        // \App\Models\BadProduct::factory(100)->create();

    }
}
