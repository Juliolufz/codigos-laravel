<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role1 = Role::create(['name'=>'admin']);
       $role2 = Role::create(['name'=>'usuario']);

       Permission::create(['name' => '/home'])->syncRoles([$role1,$role2]);

       Permission::create(['name' => 'productos.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'productos.create'])->syncRoles([$role1]);
       Permission::create(['name' => 'productos.edit'])->syncRoles([$role1]);
       Permission::create(['name' => 'productos.destroy'])->syncRoles([$role1]);


       Permission::create(['name' => 'categorias.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'categorias.create'])->syncRoles([$role1]);
       Permission::create(['name' => 'categorias.edit'])->syncRoles([$role1]);
       Permission::create(['name' => 'categorias.destroy'])->syncRoles([$role1]);


       Permission::create(['name' => 'subcategorias.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'subcategorias.create'])->syncRoles([$role1]);
       Permission::create(['name' => 'subcategorias.edit'])->syncRoles([$role1]);
       Permission::create(['name' => 'subcategorias.destroy'])->syncRoles([$role1]);
    }
}
