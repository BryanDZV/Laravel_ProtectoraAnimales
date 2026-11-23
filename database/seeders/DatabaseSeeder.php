<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Adopcion;
use App\Models\Animal;
use App\Models\Revision;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //
        //creamos useraio fijos
        User::create([
            'login' => 'admin',
            'role' => 'administrador',
            'password' => Hash::make('admin123'),
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'telefono' => '1234567890'
        ]);
        User::create([
            'login' => 'cuidador1',
            'role' => 'cuidador',
            'password' => Hash::make('cui123'),
            'name' => 'Cuidador User',
            'email' => 'cuidador1@example.com',
            'telefono' => '0987654321'
        ]);
        User::create([
            'login' => 'vet1',
            'role' => 'veterinario',
            'password' => Hash::make('vet123'),
            'name' => 'Veterinario User',
            'email' => 'vet1@example.com',
            'telefono' => '0987654321'
        ]);

        // Crear 50 usuarios,animal,adopcion,revision
        //son padres se crean primero para evitar errores de clave foranea
        User::factory(50)->create();
        Animal::factory(15)->create();


        //modelos con fk son hijos, se crean despues de los padres
        // para evitar errores de clave foranea

        //creo hijos
        Revision::factory(30)->create();

        // SI NO PUEDE REPETIRSE EL MISMO ANIMAL EN VARIAS ADOPCIONES
        //"Se deben crear X registros y deben pertenecer a Y existentes sin repetirse
        $animales = Animal::inRandomOrder()
            ->take(5)
            ->get();

        $seguimiento = true; // Variable para alternar

        foreach ($animales as $animal) {
            // Llamamos al factory para rellenar el resto de campos (nombre, fecha)
            Adopcion::factory()->create([
                'animal_id' => $animal->id,
                'seguimiento' => $seguimiento,
            ]);

            // Invertimos el valor para la siguiente vuelta: true -> false -> true...
            $seguimiento = !$seguimiento;
        }
    }
}
