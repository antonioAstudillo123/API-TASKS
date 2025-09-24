<?php

namespace App\Services\Users;


use App\Models\User;
use App\Services\BaseService;
use App\Services\Tasks\TaskService;

class UserService extends BaseService
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     *  Este metodo nos permite comprobar si el usuario en cuestion, tiene mas o igual de 5 tareas sin completar asignadas
     * Si el valor es true, significa que a ese usuario, se le pueden asignar mas tareas, pues el total de tareas asignadas
     * que tiene hasta este momento, es menor a 5(limite superior de tareas asignadas a un usuario)
     *
     * @param integer $id -> es el id del usuario que queremos validar
     * @return boolean 
     */
    public function canAssignMoreTasks(int $id): bool
    {
        return app(TaskService::class)->query()->where('user_id', $id)
            ->where('is_completed', false)
            ->count() < 5;
    }
}
