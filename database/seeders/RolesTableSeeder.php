<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();

        $adminPermission = Permission::create(['name' => 'crear_usuarios']);
        $adminRole = Role::create(['name' => 'Administrador']);
        $directorRole = Role::create(['name' => 'Director']);
        $jefeRole = Role::create(['name' => 'Jefe']);
        $empleadoRole = Role::create(['name' => 'Empleado']);


        $admin = new User();
            $admin->rut = "16.447.779-7";
            $admin->pais = "chile";
            $admin->nombres = "Rafael";
            $admin->apellidos = "Echeverria Reyes";
            $admin->email = "rafaecheverria@live.cl";
            $admin->password = bcrypt("raer2608");
            $admin->estado = 1;
            $admin->cargo_id = 4;
            $admin->departamento_id = 9;
            $admin->save();

            $admin->assignRole($adminRole);

            $jefe2 = new User();
            $jefe2->rut = "8-983.876-9";
            $jefe2->pais = "chile";
            $jefe2->nombres = "Ximena Andrea";
            $jefe2->apellidos = "Montero Moreno";
            $jefe2->email = "xmontero@integra.cl";
            $jefe2->password = bcrypt("raer2608");
            $jefe2->estado = 1;
            $jefe2->cargo_id = 1;
            $jefe2->departamento_id = 9;
            $jefe2->save();

            $jefe2->assignRole($adminRole);

        $jefe = new User();
            $jefe->rut = "17.748.600-0";
            $jefe->pais = "chile";
            $jefe->nombres = "Valeska Araceli";
            $jefe->apellidos = "Puentes Rodriguez";
            $jefe->email = "vpuentes@integra.cl";
            $jefe->password = bcrypt("raer2608");
            $jefe->estado = 1;
            $jefe->cargo_id = 3;
            $jefe->departamento_id = 2;

            $jefe->save();

            $jefe->assignRole($jefeRole);

        $jefe2 = new User();
            $jefe2->rut = "7.927.773-8";
            $jefe2->pais = "chile";
            $jefe2->nombres = "Eduardo Antonio";
            $jefe2->apellidos = "Lagos Urbina";
            $jefe2->email = "elagos@integra.cl";
            $jefe2->password = bcrypt("raer2608");
            $jefe2->estado = 1;
            $jefe2->cargo_id = 2;
            $jefe2->departamento_id = 10;

            $jefe2->save();

            $jefe2->assignRole($jefeRole);

            $empleado = new User();
            $empleado->rut = "17.748.600-0";
            $empleado->pais = "chile";
            $empleado->nombres = "Ercik Andés";
            $empleado->apellidos = "Velozo Moreira";
            $empleado->email = "evelozo@integra.cl";
            $empleado->password = bcrypt("raer2608");
            $empleado->estado = 1;
            $empleado->cargo_id = 3;
            $empleado->departamento_id = 26;

            $empleado->save();

            $empleado->assignRole($empleadoRole);
            $empleado->givePermissionTo($adminPermission);
            $adminRole->givePermissionTo('crear_usuarios');
    }
}
