<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;
    protected $table = "niveles";

    /*public function departamentos(){
        return $this->belongsToMany(Deparmamento::class, 'departamento_nivel', 'departamento_id');
    }

    public function jornadas(){
        return $this->belongsToMany(Jornada::class, 'departamento_nivel', 'jornada_id');
    }

    public function grupos(){
        return $this->belongsToMany(grupos::class, 'departamento_nivel', 'grupo_id');
    }*/

    public function departamentos()
    {
        return $this->belongsToMany(Deparmamento::class, 'departamento_nivel')
                    ->withPivot('nivel_id');
    }

    public function jornadas(){
        return $this->belongsTo(Jornada::class, 'jornadas');
    }

    public static function NivelDepto($id)
    {
        $departamento = Departamento::findOrFail($id);
        $niveles = $departamento->niveles;  
        $jornadas = $niveles->unique('jornada_id')->values(); // unique() no repite las jornadas de los nivele, Ej: tiene 2 nivles en jornada normal solo trae 1 jornada normal.

        $allJornadas = $jornadas->map(function ($item) {  
            $data = Jornada::select("jornadas.id", "jornadas.jornada")
                            ->where("jornadas.id", "=", $item->jornada_id)->get();

            return $data;
        });
                      
        return 
            [
                'niveles'  => $niveles,
                'jornadas' => $allJornadas->flatten(), //Funcion flatten() aplana colección multidimensional que entrega map().
            ];
    }

    public static function NivelJornada($id)
    {
        $jornada = Departamento::findOrFail($id);
        $jor = $jornada->jornada;

        return $jor;
    }

}
