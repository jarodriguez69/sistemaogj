<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoActividad extends Model
{
    use HasFactory;
 //protected $fillable = ['name', 'description', 'enabled']; //permito que se guarden estos campos
 protected $guarded = []; //ignora los campos indicados
 protected $table = "estado_actividades";
    //Relación uno a muchos
    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }
}
