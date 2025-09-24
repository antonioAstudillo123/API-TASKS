<?php

namespace App\Models\Companies;

use App\Models\Tasks\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    protected $fillable = [
        'name'
    ];



    /**
     * Una compañia, puede tener una o muchas tareas relacionadas
     * 
     * Al igual que con el modelo User, no es necesario definir los siguientes dos parámetros en el método hasMany, 
     * ya que estamos siguiendo la convención de nombres de Eloquent
     * Esto significa que Eloquent interpreta de forma implícita tanto el nombre de la clave foránea como el de la clave primaria, 
     * por lo que no es  necesario especificarlos manualmente,  
     * 
     */

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
