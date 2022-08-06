<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operativa extends Model
{
    use HasFactory;

    use HasFactory;
    protected $guarded = [];
    //Relacion uno a muchos inversa
    public function estrategicas(){
        return $this->belongsTo(Estrategica::class, 'estrategica_id');
    }

    //Relación uno a muchos
    public function objetivos()
    {
        return $this->hasMany(Objetivo::class);
    }

}
