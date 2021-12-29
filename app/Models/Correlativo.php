<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correlativo extends Model
{
    use HasFactory;
    protected $table = "correlativos";

	 protected $fillable = [

        'id', 'tipo_documento', 'departamento', 'numero'
    ];
}
