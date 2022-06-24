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
                [1,'Dirección', 'Dirección', 'D',2, 18],
                [2,'Comunicaciones y Asuntos Institucionales', 'Com. Asuntos Inst.', 'DCAI',2, 18],
                [3,'Asesoría Jurídica', 'As. Jurídica', 'DAJ',2, 18],
                [4,'Planificación y Seguimiento a la  Gestión', 'P.S a la Gestiòn', 'DPSG',2, 18],
                [5,'Administración y Servicios Educativos', 'Adm. y Serv. Educativos', 'DASE',2, 18],
                [6,'Soporte Tecnológico', 'Sop. Tecnológico', 'SP',2, 18],
                [7,'Servicio a Personas', 'Serv. Personas', 'DSP',2, 18],
                [8,'Espacios Físicos y Educativos', 'Esp. Fis. y Educativos', 'DEFE',2, 18],
                [9,'Cobertura y Proyectos', 'Cob. y Proyectos', 'DCP',2, 18],
                [10,'Administración y Finanzas', 'Adm. y Finanzas', 'DAF',2, 18],
                [11,'Reconocimiento Oficial', 'Rec. Oficial', 'DRO',2, 18],
                [12,'Área de Calidad Educativa', 'A. Cal. Educativa', 'DACE',2, 18],
                [13,'Asesoría Técnica Regional', 'As. Téc. Regional', 'DATR',2, 18],
                [14,'Desarrollo de Personas y Equipos', 'Des. de Per. y Equipos', 'DPE',2, 18],
                [15,'Promoción y Protección de la Infancia', 'Prom. y Prot. de la Infancia', 'PPI',2, 18],
                [16,'Departamento de Educación', 'Dep. Educaciòn', 'DE',2, 18],
                [17,'Dirección nor', 'Direcciòn', 'D',2, 8],
                [18,'Comunicaciones y Asuntos Institucionales nor', 'Com. Asuntos Inst.', 'DCAI',2, 8],
                [19,'Asesoría Jurídica nor', 'As. Jurídica', 'DAJ',2, 8],
                [20,'Planificación y Seguimiento a la  Gestión nor', 'P.S a la Gestiòn', 'DPSG',2, 8],
                [21,'Administración y Servicios Educativos nor', 'Adm. y Serv. Educativos', 'DASE',2, 8],
                [22,'Soporte Tecnológico nor', 'Sop. Tecnológico', 'SP',2, 8],
                [23,'Servicio a Personas nor', 'Serv. Personas', 'DSP',2, 8],
                [24,'Espacios Físicos y Educativos nor', 'Esp. Fis. y Educativos', 'DEFE',2, 8],
                [25,'Cobertura y Proyectos nor', 'Cob. y Proyectos', 'DCP',2, 8],
                [26,'Administración y Finanzas nor', 'Adm. y Finanzas', 'DAF',2, 8],
                [27,'Reconocimiento Oficial nor', 'Rec. Oficial', 'DRO',2, 8],
                [28,'Área de Calidad Educativa nor', 'A. Cal. Educativa', 'DACE',2, 8],
                [29,'Asesoría Técnica Regional nor', 'As. Téc. Regional', 'DATR',2, 8],
                [30,'Desarrollo de Personas y Equipos nor', 'Des. de Per. y Equipos', 'DPE',2, 8],
                [31,'Promoción y Protección de la Infancia nor', 'Prom. y Prot. de la Infancia', 'PPI',2, 8],
                [32,'Departamento de Educación nor', 'Dep. Educaciòn', 'DE',2, 8],
                [33,'Jardín Infantil Los Volcanes', 'JI Los Volcanes', 'JILV',1, 18],
            ];
            $departamentos = array_map(function($departamento) use ($now){
               return [
                   'id' => $departamento[0],
                   'departamento' => $departamento[1],
                   'abreviado' => $departamento[2],
                   'sigla' => $departamento[3],
                   'tipo_departamento_id' => $departamento[4],
                   'region_id' => $departamento[5],
                   'updated_at' => $now,
                   'created_at' => $now,
               ];
            }, $departamentos);
            DB::table('departamentos')->insert($departamentos);
        }
    }
}
