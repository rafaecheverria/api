<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = "departamentos";

	 protected $fillable = [

        'id', 'departamento', 'abreviado', 'sigla', 'region_id'
    ];

    public function user()
    {
        return $this->HasMany(Users::class);
    }

    public function region()
    {
       return $this->belongsTo(Region::class);
    }

    /*public function niveles(){
        return $this->belongsToMany(Nivel::class, 'departamento_nivel', 'nivel_id')
                    ->withPivot('grupo_id', 'jornada_id');
    }*/

    public function niveles(){
        return $this->belongsToMany(Nivel::class,'departamento_nivel')
            ->withPivot('nivel_id');
    }
   /* public function jornadas(){
        return $this->belongsToMany(Jornadas::class,'departamento_nivel')
            ->withPivot('jornada_id'); 
    }*/

    public static function DeptoReg($id)
    {
        $departamentos = Departamento::select('id', 'departamento')
                                    ->where("region_id", "=", $id)
                                    ->orderBy('departamento', 'ASC')
                                    ->get();

        return $departamentos;
    }
}