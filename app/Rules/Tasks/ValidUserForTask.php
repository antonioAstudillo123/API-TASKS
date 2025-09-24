<?php

namespace App\Rules\Tasks;

use Closure;
use App\Services\Users\UserService;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidUserForTask implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!app(UserService::class)->canAssignMoreTasks($value)) {
            $fail("El usuario ya tiene el máximo de tareas activas permitidas.");
        }
    }
}
