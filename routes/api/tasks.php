<?php

use App\Http\Controllers\Tasks\TaskController;
use Illuminate\Support\Facades\Route;


Route::post('/tasks/create', [TaskController::class, 'store']);
