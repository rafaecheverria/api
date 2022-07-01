<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;
use App\Models\Nivel;

class Jornada extends Model
{
    use HasFactory;

    public function departamentos(){
        return $this->belongsToMany(Departamento::class, 'departamento_jornada');
    }

    public function niveles(){
        return $this->belongsToMany(Nivel::class, 'jornada_nivel');
    }

    public static function JornadaDepto($id)
    {

        $departamento = Departamento::findOrFail($id);
        $jornadas = $departamento->jornadas;

        return $jornadas;

    }
}
