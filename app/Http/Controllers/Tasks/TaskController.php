<?php

namespace App\Http\Controllers\Tasks;

use App\Services\Tasks\TaskService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\StoreTaskRequest;
use App\Http\Resources\Tasks\TaskWithCompanyResource;

class TaskController extends Controller
{


    /**
     * Creamos la tarea, posteriormente mediante el metodo load el cual nos permite cargar relaciones a un modelo existen,
     * cargamos la relacion user y company para poder mandar el modelo completo a la clase Resource, y esta pueda retonarlo en un formato Json
     * valido al cliente, de acuerdo a las especificaciones solicitadas en la prueba 
     */
    public function store(StoreTaskRequest $request)
    {
        $model = app(TaskService::class)->create($request->all());
        $model->load(['user', 'company']);
        return new TaskWithCompanyResource($model);
    }
}
