<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComunasRegionesTableSeeder extends Seeder
{
    public function run()
    {
        $now = \Carbon\Carbon::now();

        $paises = [
            [1,'Chile'],
            [2,'Afganistán'],
            [3,'Albania'],
            [4,'Alemania'],
            [5,'Andorra'],
            [6,'Angola'],
            [7,'Anguilla'],
            [8,'Antártida'],
            [9,'Antigua y Barbuda'],
            [10,'Antillas Holandesas'],
            [11,'Arabia Saudí'],
            [12,'Argelia'],
            [13,'Argentina'],
            [14,'Armenia'],
            [15,'Aruba'],
            [16,'Australia'],
            [17,'Austria'],
            [18,'Azerbaiyán'],
            [19,'Bahamas'],
            [20,'Bahrein'],
            [21,'Bangladesh'],
            [22,'Barbados'],
            [23,'Bélgica'],
            [24,'Belice'],
            [25,'Benin'],
            [26,'Bermudas'],
            [27,'Bielorrusia'],
            [28,'Birmania'],
            [29,'Bolivia'],
            [30,'Bosnia y Herzegovina'],
            [31,'Botswana'],
            [32,'Brasil'],
            [33,'Brunei'],
            [34,'Bulgaria'],
            [35,'Burkina Faso'],
            [36,'Burundi'],
            [37,'Bután'],
            [38,'Cabo Verde'],
            [39,'Camboya'],
            [40,'Camerún'],
            [41,'Canadá'],
            [42,'Chad'],
            [43,'China'],
            [44,'Chipre'],
            [45,'Ciudad del Vaticano (Santa Sede)'],
            [46,'Colombia'],
            [47,'Comores'],
            [48,'Congo'],
            [49,'Corea'],
            [50,'Costa de Marfíl'],
            [51,'Costa Rica'],
            [52,'Croacia (Hrvatska)'],
            [53,'Cuba'],
            [54,'Dinamarca'],
            [55,'Djibouti'],
            [56,'Dominica'],
            [57,'Ecuador'],
            [58,'Egipto'],
            [59,'El Salvador'],
            [60,'Emiratos Árabes Unidos'],
            [61,'Eritrea'],
            [62,'Eslovenia'],
            [63,'España'],
            [64,'Estados Unidos'],
            [65,'Estonia'],
            [66,'Etiopía'],
            [67,'Fiji'],
            [68,'Filipinas'],
            [69,'Finlandia'],
            [70,'Francia'],
            [71,'Gabón'],
            [72,'Gambia'],
            [73,'Georgia'],
            [74,'Ghana'],
            [75,'Gibraltar'],
            [76,'Granada'],
            [77,'Grecia'],
            [78,'Groenlandia'],
            [79,'Guadalupe'],
            [80,'Guam'],
            [81,'Guatemala'],
            [82,'Guayana'],
            [83,'Guayana Francesa'],
            [84,'Guinea'],
            [85,'Guinea Ecuatorial'],
            [86,'Guinea-Bissau'],
            [87,'Haití'],
            [88,'Honduras'],
            [89,'Hungría'],
            [90,'India'],
            [91,'Indonesia'],
            [92,'Irak'],
            [93,'Irán'],
            [94,'Irlanda'],
            [95,'Isla Bouvet'],
            [96,'Isla de Christmas'],
            [97,'Islandia'],
            [98,'Islas Caimán'],
            [99,'Islas Cook'],
            [100,'Islas de Cocos o Keeling'],
            [101,'Islas Faroe'],
            [102,'Islas Heard y McDonald'],
            [103,'Islas Malvinas'],
            [104,'Islas Marianas del Norte'],
            [105,'Islas Marshall'],
            [106,'Islas menores de Estados Unidos'],
            [107,'Islas Palau'],
            [108,'Islas Salomón'],
            [109,'Islas Svalbard y Jan Mayen'],
            [110,'Islas Tokelau'],
            [111,'Islas Turks y Caicos'],
            [112,'Islas Vírgenes (EEUU)'],
            [113,'Islas Vírgenes (Reino Unido)'],
            [114,'Islas Wallis y Futuna'],
            [115,'Israel'],
            [116,'Italia'],
            [117,'Jamaica'],
            [118,'Japón'],
            [119,'Jordania'],
            [120,'Kazajistán'],
            [121,'Kenia'],
            [122,'Kirguizistán'],
            [123,'Kiribati'],
            [124,'Kuwait'],
            [125,'Laos'],
            [126,'Lesotho'],
            [127,'Letonia'],
            [128,'Líbano'],
            [129,'Liberia'],
            [130,'Libia'],
            [131,'Liechtenstein'],
            [132,'Lituania'],
            [133,'Luxemburgo'],
            [134,'Macedonia, Ex-República Yugoslava de'],
            [135,'Madagascar'],
            [136,'Malasia'],
            [137,'Malawi'],
            [138,'Maldivas'],
            [139,'Malí'],
            [140,'Malta'],
            [141,'Marruecos'],
            [142,'Martinica'],
            [143,'Mauricio'],
            [144,'Mauritania'],
            [145,'Mayotte'],
            [146,'México'],
            [147,'Micronesia'],
            [148,'Moldavia'],
            [149,'Mónaco'],
            [150,'Mongolia'],
            [151,'Montserrat'],
            [152,'Mozambique'],
            [153,'Namibia'],
            [154,'Nauru'],
            [155,'Nepal'],
            [156,'Nicaragua'],
            [157,'Nigeria'],
            [158,'Niue'],
            [159,'Norfolk'],
            [160,'Noruega'],
            [161,'Nueva Caledonia'],
            [162,'Nueva Zelanda'],
            [163,'Omán'],
            [164,'Países Bajos'],
            [165,'Panamá'],
            [166,'Papúa Nueva Guinea'],
            [167,'Paquistán'],
            [168,'Paraguay'],
            [169,'Perú'],
            [170,'Pitcairn'],
            [171,'Polinesia Francesa'],
            [172,'Polonia'],
            [173,'Portugal'],
            [174,'Puerto Rico'],
            [175,'Qatar'],
            [176,'Reino Unido'],
            [177,'República Centroafricana'],
            [178,'República Checa'],
            [179,'República de Sudáfrica'],
            [180,'República Dominicana'],
            [181,'República Eslovaca'],
            [182,'Reunión'],
            [183,'Ruanda'],
            [184,'Rumania'],
            [185,'Rusia'],
            [186,'Sahara Occidental'],
            [187,'Saint Kitts y Nevis'],
            [188,'Samoa'],
            [189,'Samoa Americana'],
            [190,'San Marino'],
            [191,'San Vicente y Granadinas'],
            [192,'Santa Helena'],
            [193,'Santa Lucía'],
            [194,'Santo Tomé y Príncipe'],
            [195,'Senegal'],
            [196,'Seychelles'],
            [197,'Sierra Leona'],
            [198,'Singapur'],
            [199,'Siria'],
            [200,'Somalia'],
            [201,'Sri Lanka'],
            [202,'St Pierre y Miquelon'],
            [203,'Suazilandia'],
            [204,'Sudán'],
            [205,'Suecia'],
            [206,'Suiza'],
            [207,'Surinam'],
            [208,'Tailandia'],
            [209,'Taiwán'],
            [210,'Tanzania'],
            [211,'Tayikistán'],
            [212,'Territorios franceses del Sur'],
            [213,'Timor Oriental'],
            [214,'Togo'],
            [215,'Tonga'],
            [216,'Trinidad y Tobago'],
            [217,'Túnez'],
            [218,'Turkmenistán'],
            [219,'Turquía'],
            [220,'Tuvalu'],
            [221,'Ucrania'],
            [222,'Uganda'],
            [223,'Uruguay'],
            [224,'Uzbekistán'],
            [225,'Vanuatu'],
            [226,'Venezuela'],
            [227,'Vietnam'],
            [228,'Yemen'],
            [229,'Yugoslavia'],
            [230,'Zambia'],
            [231,'Zimbabue'],
        ];
        $paises = array_map(function($pais) use ($now){
           return [
               'id' => $pais[0],
               'nombre' => $pais[1],
               'updated_at' => $now,
               'created_at' => $now,
           ];
        }, $paises);
        DB::table('paises')->insert($paises);

        $regiones = [
            [1,'Casa Central',1],
            [2,'XV - Arica y Parinacota',1],
            [3,'I - Tarapacá',1],
            [4,'II - Antofagasta',1],
            [5,'III - Atacama',1],
            [6,'IV - Coquimbo',1],
            [7,'V - Valparaiso',1],
            [8,'RM - Metropolitana Norponiente',1],
            [9,'RM - Metropolitana Suroriente',1],
            [10,'VI - Libertador General Bernardo O\'Higgins',1],
            [11,'VII - Maule',1],
            [12,'VIII - Biobío',1],
            [13,'IX - La Araucanía',1],
            [14,'XIV - Los Ríos',1],
            [15,'X - Los Lagos',1],
            [16,'XI - Aisén del General Carlos Ibáñez del Campo',1],
            [17,'XII - Magallanes y de la Antártica Chilena',1],
            [18,'XVI - Región de Ñuble',1]
        ];
        $regiones = array_map(function($region) use ($now){
           return [
               'id' => $region[0],
               'nombre' => $region[1],
               'pais_id' => $region[2],
               'updated_at' => $now,
               'created_at' => $now,
           ];
        }, $regiones);
        DB::table('regiones')->insert($regiones);

        $comunas = [
            [1,'Arica',1],
            [2,'Camarones',1],
            [3,'General Lagos',1],
            [4,'Putre',1],
            [5,'Alto Hospicio',2],
            [6,'Iquique',2],
            [7,'Camiña',2],
            [8,'Colchane',2],
            [9,'Huara',2],
            [10,'Pica',2],
            [11,'Pozo Almonte',2],
            [12,'Antofagasta',3],
            [13,'Mejillones',3],
            [14,'Sierra Gorda',3],
            [15,'Taltal',3],
            [16,'Calama',3],
            [17,'Ollague',3],
            [18,'San Pedro de Atacama',3],
            [19,'María Elena',3],
            [20,'Tocopilla',3],
            [21,'Chañaral',4],
            [22,'Diego de Almagro',4],
            [23,'Caldera',4],
            [24,'Copiapó',4],
            [25,'Tierra Amarilla',4],
            [26,'Alto del Carmen',4],
            [27,'Freirina',4],
            [28,'Huasco',4],
            [29,'Vallenar',4],
            [30,'Canela',5],
            [31,'Illapel',5],
            [32,'Los Vilos',5],
            [33,'Salamanca',5],
            [34,'Andacollo',5],
            [35,'Coquimbo',5],
            [36,'La Higuera',5],
            [37,'La Serena',5],
            [38,'Paihuaco',5],
            [39,'Vicuña',5],
            [40,'Combarbalá',5],
            [41,'Monte Patria',5],
            [42,'Ovalle',5],
            [43,'Punitaqui',5],
            [44,'Río Hurtado',5],
            [45,'Isla de Pascua',6],
            [46,'Calle Larga',6],
            [47,'Los Andes',6],
            [48,'Rinconada',6],
            [49,'San Esteban',6],
            [50,'La Ligua',6],
            [51,'Papudo',6],
            [52,'Petorca',6],
            [53,'Zapallar',6],
            [54,'Hijuelas',6],
            [55,'La Calera',6],
            [56,'La Cruz',6],
            [57,'Limache',6],
            [58,'Nogales',6],
            [59,'Olmué',6],
            [60,'Quillota',6],
            [61,'Algarrobo',6],
            [62,'Cartagena',6],
            [63,'El Quisco',6],
            [64,'El Tabo',6],
            [65,'San Antonio',6],
            [66,'Santo Domingo',6],
            [67,'Catemu',6],
            [68,'Llaillay',6],
            [69,'Panquehue',6],
            [70,'Putaendo',6],
            [71,'San Felipe',6],
            [72,'Santa María',6],
            [73,'Casablanca',6],
            [74,'Concón',6],
            [75,'Juan Fernández',6],
            [76,'Puchuncaví',6],
            [77,'Quilpué',6],
            [78,'Quintero',6],
            [79,'Valparaíso',6],
            [80,'Villa Alemana',6],
            [81,'Viña del Mar',6],
            [82,'Colina',7],
            [83,'Lampa',7],
            [84,'Tiltil',7],
            [85,'Pirque',7],
            [86,'Puente Alto',7],
            [87,'San José de Maipo',7],
            [88,'Buin',7],
            [89,'Calera de Tango',7],
            [90,'Paine',7],
            [91,'San Bernardo',7],
            [92,'Alhué',7],
            [93,'Curacaví',7],
            [94,'María Pinto',7],
            [95,'Melipilla',7],
            [96,'San Pedro',7],
            [97,'Cerrillos',7],
            [98,'Cerro Navia',7],
            [99,'Conchalí',7],
            [100,'El Bosque',7],
            [101,'Estación Central',7],
            [102,'Huechuraba',7],
            [103,'Independencia',7],
            [104,'La Cisterna',7],
            [105,'La Granja',7],
            [106,'La Florida',7],
            [107,'La Pintana',7],
            [108,'La Reina',7],
            [109,'Las Condes',7],
            [110,'Lo Barnechea',7],
            [111,'Lo Espejo',7],
            [112,'Lo Prado',7],
            [113,'Macul',7],
            [114,'Maipú',7],
            [115,'Ñuñoa',7],
            [116,'Pedro Aguirre Cerda',7],
            [117,'Peñalolén',7],
            [118,'Providencia',7],
            [119,'Pudahuel',7],
            [120,'Quilicura',7],
            [121,'Quinta Normal',7],
            [122,'Recoleta',7],
            [123,'Renca',7],
            [124,'San Miguel',7],
            [125,'San Joaquín',7],
            [126,'San Ramón',7],
            [127,'Santiago',7],
            [128,'Vitacura',7],
            [129,'El Monte',7],
            [130,'Isla de Maipo',7],
            [131,'Padre Hurtado',7],
            [132,'Peñaflor',7],
            [133,'Talagante',7],
            [134,'Codegua',8],
            [135,'Coínco',8],
            [136,'Coltauco',8],
            [137,'Doñihue',8],
            [138,'Graneros',8],
            [139,'Las Cabras',8],
            [140,'Machalí',8],
            [141,'Malloa',8],
            [142,'Mostazal',8],
            [143,'Olivar',8],
            [144,'Peumo',8],
            [145,'Pichidegua',8],
            [146,'Quinta de Tilcoco',8],
            [147,'Rancagua',8],
            [148,'Rengo',8],
            [149,'Requínoa',8],
            [150,'San Vicente de Tagua Tagua',8],
            [151,'La Estrella',8],
            [152,'Litueche',8],
            [153,'Marchihue',8],
            [154,'Navidad',8],
            [155,'Peredones',8],
            [156,'Pichilemu',8],
            [157,'Chépica',8],
            [158,'Chimbarongo',8],
            [159,'Lolol',8],
            [160,'Nancagua',8],
            [161,'Palmilla',8],
            [162,'Peralillo',8],
            [163,'Placilla',8],
            [164,'Pumanque',8],
            [165,'San Fernando',8],
            [166,'Santa Cruz',8],
            [167,'Cauquenes',9],
            [168,'Chanco',9],
            [169,'Pelluhue',9],
            [170,'Curicó',9],
            [171,'Hualañé',9],
            [172,'Licantén',9],
            [173,'Molina',9],
            [174,'Rauco',9],
            [175,'Romeral',9],
            [176,'Sagrada Familia',9],
            [177,'Teno',9],
            [178,'Vichuquén',9],
            [179,'Colbún',9],
            [180,'Linares',9],
            [181,'Longaví',9],
            [182,'Parral',9],
            [183,'Retiro',9],
            [184,'San Javier',9],
            [185,'Villa Alegre',9],
            [186,'Yerbas Buenas',9],
            [187,'Constitución',9],
            [188,'Curepto',9],
            [189,'Empedrado',9],
            [190,'Maule',9],
            [191,'Pelarco',9],
            [192,'Pencahue',9],
            [193,'Río Claro',9],
            [194,'San Clemente',9],
            [195,'San Rafael',9],
            [196,'Talca',9],
            [197,'Arauco',10],
            [198,'Cañete',10],
            [199,'Contulmo',10],
            [200,'Curanilahue',10],
            [201,'Lebu',10],
            [202,'Los Álamos',10],
            [203,'Tirúa',10],
            [204,'Alto Biobío',10],
            [205,'Antuco',10],
            [206,'Cabrero',10],
            [207,'Laja',10],
            [208,'Los Ángeles',10],
            [209,'Mulchén',10],
            [210,'Nacimiento',10],
            [211,'Negrete',10],
            [212,'Quilaco',10],
            [213,'Quilleco',10],
            [214,'San Rosendo',10],
            [215,'Santa Bárbara',10],
            [216,'Tucapel',10],
            [217,'Yumbel',10],
            [218,'Chiguayante',10],
            [219,'Concepción',10],
            [220,'Coronel',10],
            [221,'Florida',10],
            [222,'Hualpén',10],
            [223,'Hualqui',10],
            [224,'Lota',10],
            [225,'Penco',10],
            [226,'San Pedro de La Paz',10],
            [227,'Santa Juana',10],
            [228,'Talcahuano',10],
            [229,'Tomé',10],
            [230,'Bulnes',16],
            [231,'Chillán',16],
            [232,'Chillán Viejo',16],
            [233,'Cobquecura',16],
            [234,'Coelemu',16],
            [235,'Coihueco',16],
            [236,'El Carmen',16],
            [237,'Ninhue',16],
            [238,'Ñiquen',16],
            [239,'Pemuco',16],
            [240,'Pinto',16],
            [241,'Portezuelo',16],
            [242,'Quillón',16],
            [243,'Quirihue',16],
            [244,'Ránquil',16],
            [245,'San Carlos',16],
            [246,'San Fabián',16],
            [247,'San Ignacio',16],
            [248,'San Nicolás',16],
            [249,'Treguaco',16],
            [250,'Yungay',16],
            [251,'Carahue',11],
            [252,'Cholchol',11],
            [253,'Cunco',11],
            [254,'Curarrehue',11],
            [255,'Freire',11],
            [256,'Galvarino',11],
            [257,'Gorbea',11],
            [258,'Lautaro',11],
            [259,'Loncoche',11],
            [260,'Melipeuco',11],
            [261,'Nueva Imperial',11],
            [262,'Padre Las Casas',11],
            [263,'Perquenco',11],
            [264,'Pitrufquén',11],
            [265,'Pucón',11],
            [266,'Saavedra',11],
            [267,'Temuco',11],
            [268,'Teodoro Schmidt',11],
            [269,'Toltén',11],
            [270,'Vilcún',11],
            [271,'Villarrica',11],
            [272,'Angol',11],
            [273,'Collipulli',11],
            [274,'Curacautín',11],
            [275,'Ercilla',11],
            [276,'Lonquimay',11],
            [277,'Los Sauces',11],
            [278,'Lumaco',11],
            [279,'Purén',11],
            [280,'Renaico',11],
            [281,'Traiguén',11],
            [282,'Victoria',11],
            [283,'Corral',12],
            [284,'Lanco',12],
            [285,'Los Lagos',12],
            [286,'Máfil',12],
            [287,'Mariquina',12],
            [288,'Paillaco',12],
            [289,'Panguipulli',12],
            [290,'Valdivia',12],
            [291,'Futrono',12],
            [292,'La Unión',12],
            [293,'Lago Ranco',12],
            [294,'Río Bueno',12],
            [295,'Ancud',13],
            [296,'Castro',13],
            [297,'Chonchi',13],
            [298,'Curaco de Vélez',13],
            [299,'Dalcahue',13],
            [300,'Puqueldón',13],
            [301,'Queilén',13],
            [302,'Quemchi',13],
            [303,'Quellón',13],
            [304,'Quinchao',13],
            [305,'Calbuco',13],
            [306,'Cochamó',13],
            [307,'Fresia',13],
            [308,'Frutillar',13],
            [309,'Llanquihue',13],
            [310,'Los Muermos',13],
            [311,'Maullín',13],
            [312,'Puerto Montt',13],
            [313,'Puerto Varas',13],
            [314,'Osorno',13],
            [315,'Puero Octay',13],
            [316,'Purranque',13],
            [317,'Puyehue',13],
            [318,'Río Negro',13],
            [319,'San Juan de la Costa',13],
            [320,'San Pablo',13],
            [321,'Chaitén',13],
            [322,'Futaleufú',13],
            [323,'Hualaihué',13],
            [324,'Palena',13],
            [325,'Aisén',14],
            [326,'Cisnes',14],
            [327,'Guaitecas',14],
            [328,'Cochrane',14],
            [329,'O\'higgins',14],
            [330,'Tortel',14],
            [331,'Coihaique',14],
            [332,'Lago Verde',14],
            [333,'Chile Chico',14],
            [334,'Río Ibáñez',14],
            [335,'Antártica',15],
            [336,'Cabo de Hornos',15],
            [337,'Laguna Blanca',15],
            [338,'Punta Arenas',15],
            [339,'Río Verde',15],
            [340,'San Gregorio',15],
            [341,'Porvenir',15],
            [342,'Primavera',15],
            [343,'Timaukel',15],
            [344,'Natales',15],
            [345,'Torres del Paine',15],
            [346,'Cabildo',6]
        ];

        $comunas = array_map(function($comuna) use ($now){
            return [
                'id' => $comuna[0],
                'nombre' => $comuna[1],
                'region_id' => $comuna[2],
                'updated_at' => $now,
               'created_at' => $now,
            ];
        }, $comunas);
        //App\Commune::insert($data); // Eloquent approach
        DB::table('comunas')->insert($comunas); // Query Builder approach
    }
}
