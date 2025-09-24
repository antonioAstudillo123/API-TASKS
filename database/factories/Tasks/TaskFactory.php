<?php

namespace Database\Factories\Tasks;

use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Companies\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Definimos el factory para el modelo de tareas. En este caso, establecemos la fecha de inicio como el día actual, 
     * y la fecha definalización como siete días después de la fecha de inicio.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'user_id' => User::inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
            'is_completed' =>  $this->faker->randomElement([true, false]),
            'start_at' => Carbon::now(),
            'expired_at' => Carbon::now()->addDays(7),
        ];
    }
}
