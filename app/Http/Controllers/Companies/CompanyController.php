<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Companies\CompanyService;
use App\Http\Resources\Companies\CompanyResource;

class CompanyController extends Controller
{


    /**
     * Obtenemos todas las compañias, con sus respectivas tareas relacionadas
     * 
     * Estamos haciendo uso de una clase Resource, para que está sea la encargada
     * de transformar los datos de acuerdo a los criterios establecidos en los requerimientos
     * de la prueba. 
     * 
     * 
     */


    public function index()
    {
        return CompanyResource::collection(app(CompanyService::class)->queryWith(['tasks'])->get());
    }
}
