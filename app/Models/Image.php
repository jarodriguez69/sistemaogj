<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //Relacion polimorfica
    // public function imageable(){
    //     return $this->morphTo();
    // }
    // y en el modelo Post donde estaria relacionado
    // relacion uno a uno polimorfica 
    // public function image(){
    //     return $this->morphOne(Image::class, 'imageable');
    // }
}
