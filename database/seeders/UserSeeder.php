<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'nim'=> '',
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'role' => 'User',
            'password' => bcrypt('123')
        ]);

        User::create([
            'nim'=> '12345',
            'name' => 'Alumni 1',
            'email' => 'alumni1@gmail.com',
            'role' => 'Alumni',
            'password' => bcrypt('123')
        ]);
    }
}
