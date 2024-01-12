<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new User();

        $usuario->name = 'test';
        $usuario->email = 'test@gmail.com';
        $usuario->password = '12345678';

        $usuario->save();
    }
}
