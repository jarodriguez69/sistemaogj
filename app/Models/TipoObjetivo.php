<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoObjetivo extends Model
{
    use HasFactory;
 //protected $fillable = ['name', 'description', 'enabled']; //permito que se guarden estos campos
 protected $guarded = []; //ignora los campos indicados
    //Relación uno a muchos
    public function objetivos()
    {
        return $this->hasMany(Objetivo::class);
    }
}
