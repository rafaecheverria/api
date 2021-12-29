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
}