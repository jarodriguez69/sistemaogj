<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'description', 'enabled']; //permito que se guarden estos campos
    protected $guarded = ['users']; //ignora los campos indicados

    //Relacion uno a muchos inversa
    public function proyectos(){
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    //Relación muchos a muchos
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    //Relacion uno a muchos inversa
    public function files(){
        return $this->belongsTo(File::class);
    }

    //Relacion uno a mucho inversa
    public function estadotarea(){
        return $this->belongsTo(EstadoTarea::class);
    }
    
    //Relacion uno a muchos inversa
    public function procesos(){
        return $this->belongsTo(Proceso::class, 'proceso_id');
    }
       
}
