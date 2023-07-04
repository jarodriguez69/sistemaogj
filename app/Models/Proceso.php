<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'description', 'enabled']; //permito que se guarden estos campos
    protected $guarded = []; //ignora los campos indicados


    //Relación uno a muchos
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

    
    //Relación uno a muchos
    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
