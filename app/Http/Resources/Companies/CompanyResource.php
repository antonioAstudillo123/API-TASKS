<?php

namespace App\Http\Resources\Companies;

use Illuminate\Http\Request;
use App\Http\Resources\Tasks\TaskResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Basado en la documentación de Laravel, el utilizar whenLoaded me permite evitar el problema de N + 1
     * en escenarios donde la carga de los datos no se haga mediante el metodo with.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tasks' => TaskResource::collection($this->whenLoaded('tasks')),
        ];
    }
}
