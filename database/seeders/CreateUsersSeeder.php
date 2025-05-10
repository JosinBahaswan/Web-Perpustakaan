<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@itsolutionstuff.com',
                'type' => 1,
                'password' => bcrypt('123456'),
                'phone' => '1234567890', // contoh nomor telepon
                'address' => 'Jl. Contoh No. 123',
                'birthdate' => '1990-01-01',
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@itsolutionstuff.com',
                'type' => 2,
                'password' => bcrypt('123456'),
                'phone' => '9876543210',
                'address' => 'Jl. Contoh No. 456',
                'birthdate' => '1985-05-05',
            ],
            [
                'name' => 'User',
                'email' => 'user@itsolutionstuff.com',
                'type' => 0,
                'password' => bcrypt('123456'),
                'phone' => '5555555555',
                'address' => 'Jl. Contoh No. 789',
                'birthdate' => '1995-12-15',
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}