<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role0 = Role::create(['name' => 'Administrador']);
        $role1 = Role::create(['name' => 'Profesor']);
        $role2 = Role::create(['name' => 'Estudiante']);

     //   $permission = Permission::create(['name' => 'asignar.roles'])->syncRoles([$role0]);
     //   $permission = Permission::create(['name' => 'lista.roles.show'])->syncRoles([$role0, $role1]);
    
       
    }
}
