<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'description', 'enabled']; //permito que se guarden estos campos
    protected $guarded = ['users']; //ignora los campos indicados

    //Relación muchos a muchos
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
