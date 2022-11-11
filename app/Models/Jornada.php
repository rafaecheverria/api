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
        return $this->belongsToMany(Nivel::class,'depto_jornada_nivel_grupo')
            ->withPivot('grupo_id');
    }

    public function departamentos(){
        return $this->belongsToMany(Departamento::class,'depto_jornada_nivel_grupo')
            ->withPivot('nivel_id');
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class,'depto_jornada_nivel_grupo')
            ->withPivot('nivel_id');
    }

   /* public static function JornadaDepto($id)
    {

        $departamento = Nivel::findOrFail($id);
        $jornadas = $departamento->jornadas;

        return $jornadas;
    }*/

 }
