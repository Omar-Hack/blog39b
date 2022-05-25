<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cata extends Model
{
    use HasFactory;
    //protected $table = "subcategories";

    const published = 1;
    const draft = 2;

    //Relacion de muchos a muchos
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
