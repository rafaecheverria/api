<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $now = \Carbon\Carbon::now();
            $departamentos = [
                [1,'Dirección', 'Direcciòn', 'D',18],
                [2,'Comunicaciones y Asuntos Institucionales', 'Com. Asuntos Inst.', 'DCAI',18],
                [3,'Asesoría Jurídica', 'As. Jurídica', 'DAJ',18],
                [4,'Planificación y Seguimiento a la  Gestión', 'P.S a la Gestiòn', 'DPSG',18],
                [5,'Administración y Servicios Educativos', 'Adm. y Serv. Educativos', 'DASE',18],
                [6,'Soporte Tecnológico', 'Sop. Tecnológico', 'SP',18],
                [7,'Servicio a Personas', 'Serv. Personas', 'DSP',18],
                [8,'Espacios Físicos y Educativos', 'Esp. Fis. y Educativos', 'DEFE',18],
                [9,'Cobertura y Proyectos', 'Cob. y Proyectos', 'DCP',18],
                [10,'Administración y Finanzas', 'Adm. y Finanzas', 'DAF',18],
                [11,'Reconocimiento Oficial', 'Rec. Oficial', 'DRO',18],
                [12,'Área de Calidad Educativa', 'A. Cal. Educativa', 'DACE',18],
                [13,'Asesoría Técnica Regional', 'As. Téc. Regional', 'DATR',18],
                [14,'Desarrollo de Personas y Equipos', 'Des. de Per. y Equipos', 'DPE',18],
                [15,'Promoción y Protección de la Infancia', 'Prom. y Prot. de la Infancia', 'PPI',18],
                [16,'Departamento de Educación', 'Dep. Educaciòn', 'DE',18],
                [17,'Dirección', 'Direcciòn', 'D',8],
                [18,'Comunicaciones y Asuntos Institucionales', 'Com. Asuntos Inst.', 'DCAI',8],
                [19,'Asesoría Jurídica', 'As. Jurídica', 'DAJ',8],
                [20,'Planificación y Seguimiento a la  Gestión', 'P.S a la Gestiòn', 'DPSG',8],
                [21,'Administración y Servicios Educativos', 'Adm. y Serv. Educativos', 'DASE',8],
                [22,'Soporte Tecnológico', 'Sop. Tecnológico', 'SP',8],
                [23,'Servicio a Personas', 'Serv. Personas', 'DSP',8],
                [24,'Espacios Físicos y Educativos', 'Esp. Fis. y Educativos', 'DEFE',8],
                [25,'Cobertura y Proyectos', 'Cob. y Proyectos', 'DCP',8],
                [26,'Administración y Finanzas', 'Adm. y Finanzas', 'DAF',8],
                [27,'Reconocimiento Oficial', 'Rec. Oficial', 'DRO',8],
                [28,'Área de Calidad Educativa', 'A. Cal. Educativa', 'DACE',8],
                [29,'Asesoría Técnica Regional', 'As. Téc. Regional', 'DATR',8],
                [30,'Desarrollo de Personas y Equipos', 'Des. de Per. y Equipos', 'DPE',8],
                [31,'Promoción y Protección de la Infancia', 'Prom. y Prot. de la Infancia', 'PPI',8],
                [32,'Departamento de Educación', 'Dep. Educaciòn', 'DE',8],
            ];
            $departamentos = array_map(function($departamento) use ($now){
               return [
                   'id' => $departamento[0],
                   'departamento' => $departamento[1],
                   'abreviado' => $departamento[2],
                   'sigla' => $departamento[3],
                   'region_id' => $departamento[4],
                   'updated_at' => $now,
                   'created_at' => $now,
               ];
            }, $departamentos);
            DB::table('departamentos')->insert($departamentos);
        }
    }
}
