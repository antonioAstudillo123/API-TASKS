<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Tasks\Task;
use Illuminate\Database\Seeder;
use App\Models\Companies\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Es importante, que para este caso, ejecutemos los factorys en el siguiente orden:
     * Primero User o Company, el orden entre ellos no es relevante y siempre el Factory de Task
     * debe ir al final, ya que dentro de él, suponemos que ya existen registros en users y companies
     * si no existieran, sucederia una excepcion, ya que el método inRandomOrder no encotraria registro alguno.
     */
    public function run(): void
    {
        User::factory()->count(5)->create();
        Company::factory()->count(5)->create();
        Task::factory()->count(10)->create();
    }
}
