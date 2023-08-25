<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
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
        //crea un super Usuario
        User::create([
            'name' => 'Maria Isabel',
            'surname' => 'Alvarez Barriga',
            'email' => 'maria1122@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ])->assignRole('Administrador');

        //crea 10 usuarios
        User::factory()->count(10)->create()->each(function (User $user) {
            $user->assignRole('Estudiante');
        });
    }
}
