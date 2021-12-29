<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $table = "cargos";

	 protected $fillable = [

        'id', 'nombre'
    ];

    public function user()

    {
        return $this->HasMany(User::class);

    }
}
