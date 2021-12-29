<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table = "paises";

    protected $fillable = [

       'id', 'nombre'
   ];

   public static function obtener_paises(){

        $paises = Pais::select(['id', 'nombre'])->orderBy('id', 'asc')->get();

        return $paises;

    }
}
