<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivador extends Model
{
    use HasFactory;
    protected $table = "archivadores";

    protected $fillable = [

        'id', 'archivador', 'periodo', 'departamento'
    ];

    public function departamentos()

    {
        return $this->hasMany(Departamento::class);

    }
}
