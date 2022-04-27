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
        // \App\Models\User::factory(10)->create();
        $this->call([
<<<<<<< HEAD
            RoleSeeder::class,
            AdminSeeder::class,
            skillSeeder::class,
            scategorySeeder::class,
=======
            // RoleSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class
>>>>>>> a780fcf9ec03053858a9c6865b40232067477715
        ]);
    }
}
