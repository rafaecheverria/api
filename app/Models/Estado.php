<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'estado'
    ];

    public function documentos()
    {
        return $this->belongsToMany(Documento::class, 'documento_estado', 'documento_id','estado_id')
                    ->withPivot('proveido', 'origen_id', 'fecha_creado', 'fecha_actualizado', 'origen_id', 'destino_id');
    }
}
