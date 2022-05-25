<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const published = '1';
    const draft = '2';

    //Relacion de muchos a muchos
    public function catas(){
        return $this->belongsToMany(Cata::class);
    }
}
