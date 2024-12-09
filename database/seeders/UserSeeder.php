<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Hash;
Use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

          // admin
          User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'Admin'
        ]);
            //utilisateur 1
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'User'
        ]);
                //utilisateur 2
        User::create([
            'name' => 'Bill Péniel',
            'email' => 'billpen@gmail.com',
            'password' => Hash::make('password1234'),
            'role' => 'User'
        ]);

                //utilisateur 3
                User::create([
                    'name' => 'Syldon Zeus',
                    'email' => 'syldz@gmail.com',
                    'password' => Hash::make('password4321'),
                    'role' => 'User'
                ]);
    
    }
}
