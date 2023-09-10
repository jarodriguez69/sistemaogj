<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuente extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'description', 'enabled']; //permito que se guarden estos campos
    protected $guarded = []; //ignora los campos indicados


    //Relación uno a muchos
    public function tareas()
    {
        return $this->hasMany(Fuente::class);
    }
}
