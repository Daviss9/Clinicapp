<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'David Sullca Sierra',
            'email' => 'daviss9@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1.414213562'), // password

            'dni' => '42971393',
            'role' => 'admin',
        ]);
        factory(App\User::class, 50)->create();
    }
}
