<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $guarded = ['partes'];
    //Relacion uno a muchos inversa
    public function grupos(){
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    //Relación uno a muchos
    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

     //Relacion uno a mucho inversa
    public function estadoproyecto(){
        return $this->belongsTo(EstadoProyecto::class);
    }

    //Relacion uno a mucho inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    //Relación muchos a muchos
    public function equipos()
    {
        return $this->belongsToMany(User::class, "proyecto_equipo");
    }

    //Relación muchos a muchos
    public function partes()
    {
        return $this->belongsToMany(Parte::class);
    }

    // public function objetivos2(){
    //     return $this->belongsTo(Objetivo::class, 'objetivo_id');
    // }

    //Relación muchos a muchos
    public function objetivos2()
    {
        return $this->belongsToMany(Objetivo::class);
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

     //Relacion uno a muchos inversa
     public function procesos(){
        return $this->belongsTo(Proceso::class, 'proceso_id');
    }
   
}
