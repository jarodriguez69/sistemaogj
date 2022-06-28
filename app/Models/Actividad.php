<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'description', 'enabled']; //permito que se guarden estos campos
    protected $guarded = ['users']; //ignora los campos indicados
    protected $table = "actividades";
    //Relacion uno a muchos inversa
    public function objetivos(){
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }

    //Relación muchos a muchos
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    //Relacion uno a muchos inversa
    public function documentos(){
        return $this->belongsTo(Documento::class);
    }

    //Relacion uno a mucho inversa
    public function estadoactividad(){
        return $this->belongsTo(EstadoActividad::class);
    }
    
}
