<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //Manual: Or if you want to hardcode the dummies
        $this->call(UsersTableSeeder::class);

        // //auto: These are dummy values!
        \App\Models\User::factory(3)->create();
        \App\Models\Ticket::factory(10)->create();
    }
}
