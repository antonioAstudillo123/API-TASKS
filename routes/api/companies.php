<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Companies\CompanyController;


Route::get('/companies', [CompanyController::class, 'index']);
