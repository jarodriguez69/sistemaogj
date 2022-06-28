<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desarrollo extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'description', 'enabled']; //permito que se guarden estos campos
    protected $guarded = []; //ignora los campos indicados

   

    //Relación muchos a muchos
    public function objetivos()
    {
        return $this->belongsToMany(Objetivo::class);
    }

   
}
