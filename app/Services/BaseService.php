<?php


namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;


class BaseService
{

    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * Retorna una instancia del query builder con las relaciones cargadas.
     *
     * Este método no ejecuta la consulta, con el objetivo
     * de mantener la flexibilidad en capas superiores como controladores o servicios
     * específicos, donde se pueden aplicar filtros adicionales, ordenamientos o paginación. 
     * 
     * @param array $relations Relaciones Eloquent que se desean cargar
     * @return \Illuminate\Database\Eloquent\Builder
     */


    public function queryWith(array $relations = []): Builder
    {
        return $this->model->query()->with($relations);
    }




    /**
     * Creammos un recurso de un modelo especifico 
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }




    /**
     * Retornamos una query general 
     */

    public function query()
    {
        return $this->model->query();
    }
}
