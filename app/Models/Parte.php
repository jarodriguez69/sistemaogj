<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
    use HasFactory;
    protected $guarded = []; //ignora los campos indicados

    //Relación muchos a muchos
    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class);
    }

}
