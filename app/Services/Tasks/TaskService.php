<?php

namespace App\Services\Tasks;

use App\Models\Tasks\Task;
use App\Services\BaseService;

class TaskService extends BaseService
{

    public function __construct(Task $model)
    {
        parent::__construct($model);
    }
}
