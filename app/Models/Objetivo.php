<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;
    protected $guarded = ["desarrollos"];
    //Relacion uno a muchos inversa
    public function operativas(){
        return $this->belongsTo(Operativa::class, 'operativa_id');
    }

     //Relacion uno a mucho inversa
    public function estadoobjetivos(){
        return $this->belongsTo(EstadoObjetivo::class, 'estadoobjetivo_id');
    }

    //Relación uno a muchos
    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }

    //Relacion uno a mucho inversa
    public function tipoobjetivo(){
        return $this->belongsTo(TipoObjetivo::class, 'tipoobjetivo_id');
    }

    //Relacion uno a mucho inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relación muchos a muchos
    public function desarrollos()
    {
        return $this->belongsToMany(Desarrollo::class,'objetivo_desarrollo');
    }

    //Relacion muchos a muchos
    //en el modelo post
    // public function tags(){
    //     return $this->belongsToMany(Tag::class);
    // }
    //y en el modelo tag
    // public function posts(){
    //     return $this->belongsToMany(Post::class);
    // }

 
   
}
