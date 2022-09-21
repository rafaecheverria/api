<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;
use App\Models\Nivel;

class Jornada extends Model
{
    use HasFactory;

    public function niveles(){
        return $this->hasMany(Nivel::class, 'niveles', 'id');
    }

   /* public static function JornadaDepto($id)
    {

        $departamento = Nivel::findOrFail($id);
        $jornadas = $departamento->jornadas;

        return $jornadas;
    }*/

 }
