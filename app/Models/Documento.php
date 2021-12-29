<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table = "documentos";
    protected $dates = ['fecha_documento'];

	 protected $fillable = [

        'id', 'remitente', 'fecha_documento', 'tipo_documento_id', 'creador', 'numero_documento', 'asunto', 'detalle', 'folio', 'archivo'
    ];

    public function estados()
    {
        return $this->belongsToMany(Estado::class, 'documento_estado', 'documento_id','estado_id', 'id')->withPivot('id', 'proveido', 'fecha_creado', 'fecha_actualizado', 'origen_id', 'destino_id')->orderBy("pivot_id", "DESC");
    }
}
