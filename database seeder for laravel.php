<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('users')->insert([
           'name' => 'Admin',
           'email' => 'admin@admin.com',
           'password' => '$2y$10$XAS1WoV3sqHCrZimdx5G7eJxwFO22H7Q1VE8SGptzzhrGI3Ni/FRi',
           'role' => 'admin',
           'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
       ]);
     }
}


#then add it's extence to DatabaseSeeder.php
$this->call(UserTableSeeder::class);

IMPORTANT: You may need to do "composer dump-autoload"