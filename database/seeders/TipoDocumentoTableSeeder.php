<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;

class TipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_documento = new TipoDocumento;
        $tipo_documento->tipo_documento = "Carta";
        $tipo_documento->save();

        $tipo_documento = new TipoDocumento;
        $tipo_documento->tipo_documento = "Memo";
        $tipo_documento->save();

        $tipo_documento = new TipoDocumento;
        $tipo_documento->tipo_documento = "Oficio";
        $tipo_documento->save();
    }
}
