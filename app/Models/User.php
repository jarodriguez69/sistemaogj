<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relación muchos a muchos
    public function tareas()
    {
        return $this->belongsToMany(Tarea::class);
    }

    //Relación uno a muchos
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

    //Relación muchos a muchos
    public function alertas()
    {
        return $this->belongsToMany(Alerta::class);
    }

    //Relación muchos a muchos
    public function proyectosequipos()
    {
        return $this->belongsToMany(Proyecto::class, "proyecto_equipo");
    }

    //Relación muchos a muchos
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class);
    }
    
    //Relación muchos a muchos
    public function operativas()
    {
        return $this->belongsToMany(Operativa::class);
    }
}
