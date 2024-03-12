<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_number' => '0000000001',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'id_number' => '0000000002',
            'name' => 'Staf',
            'email' => 'staf@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'staf'
        ]);
    }
}
