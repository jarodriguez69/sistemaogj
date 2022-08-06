<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    use HasFactory;
    protected $guarded = [];
    //Relacion uno a muchos inversa
    public function ejes(){
        return $this->belongsTo(Eje::class, 'eje_id');
    }

    //Relación uno a muchos
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

}
