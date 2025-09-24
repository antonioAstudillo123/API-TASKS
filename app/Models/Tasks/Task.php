<?php

namespace App\Models\Tasks;

use App\Models\Companies\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'description',
        'user_id'
    ];



    /**
     * Una tarea pertenece a un usuario.
     * 
     * Cada usuario puede tener una o muchas tareas.
     * 
     * La regla de negocio establecida dice, que un usuario solamente puede tener
     * 5 tareas activas.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Una tarea puede pertenecer solamente a una compañia
     */

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
