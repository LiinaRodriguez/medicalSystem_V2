<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

      /** 
        User::create([
            'name' => 'Lina',
            'email' => 'Lina@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'cedula' => '10000011',
            'address' => 'Av Universitaria',
            'phone' => '2993901',
            'role' => 'admin',
        ]);
        */
        User::factory()->count(20)->create();
    }
}
