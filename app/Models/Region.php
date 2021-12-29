<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = "regiones";

    protected $fillable = [

       'id', 'nombre'
   ];

   public function departamento()

    {
        return $this->HasMany(Departamento::class);

    }
}
