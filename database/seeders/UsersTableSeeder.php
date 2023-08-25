<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'cpf' => '01234567891',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234'), // you can customize this
            'type' => 1,
        ]);

        User::factory()->create([
            'cpf' => '00123456789',
            'name' => 'Supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => bcrypt('super1234'), // you can customize this
            'type' => 2,
        ]);
    }
}







