<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdmin = [
            'name' => 'Eromosere',
            'email' => 'eromosere360@gmail.com',
            'password' => Hash::make('TBJ1234'),
        ];

       $newUser = User::create($userAdmin);
    }
}
