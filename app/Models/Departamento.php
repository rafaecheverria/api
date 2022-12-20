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

    public function grupos(){
        return $this->belongsToMany(Grupo::class,'departamento_grupo');
    }

    public static function DeptoReg($id)
    {
        $departamentos = Departamento::select('id', 'departamento')
                                    ->where("region_id", "=", $id)
                                    ->orderBy('departamento', 'ASC')
                                    ->get();

        return $departamentos;
    }
}