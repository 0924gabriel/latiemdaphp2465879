<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    //relacionar marca
    //con product
    public function productos(){
       return $this->hasmany(Producto::class);
    }
}
