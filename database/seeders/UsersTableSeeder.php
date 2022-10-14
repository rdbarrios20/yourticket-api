<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'identification' => 1,
                'surnames' => Str::random(10),
                'name' => "RAFAEL 1 ",
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ]
        );

        DB::table('users')->insert(
            [
                'identification' => 2,
                'surnames' => Str::random(10),
                'name' => "RAFAEL 2",
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ]
        );
        DB::table('users')->insert(
            [
                'identification' => 3,
                'surnames' => Str::random(10),
                'name' => "RAFAEL 3",
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ]
        );
    }
}
