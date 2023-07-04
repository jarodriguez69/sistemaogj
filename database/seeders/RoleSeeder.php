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
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'User']);
        $role3 = Role::create(['name'=>'Guest']);


        // Permisos para Administrador
        Permission::create(['name'=> 'admin.roles.index','description'=>'Ver Roles'])->assignRole($role1);
        Permission::create(['name'=> 'admin.roles.update','description'=>'Actualizar Roles'])->assignRole($role1);
        Permission::create(['name'=> 'admin.roles.edit','description'=>'Editar Roles'])->assignRole($role1);
        Permission::create(['name'=> 'admin.roles.create','description'=>'Crear Roles'])->assignRole($role1);
        Permission::create(['name'=> 'admin.roles.destroy','description'=>'Eliminar Roles'])->assignRole($role1);
        Permission::create(['name'=> 'admin.users.index','description'=>'Ver Usuarios'])->assignRole($role1);
        Permission::create(['name'=> 'admin.users.update','description'=>'Actualizar Usuarios'])->assignRole($role1);
        Permission::create(['name'=> 'admin.users.edit','description'=>'Editar Usuarios'])->assignRole($role1);
        Permission::create(['name'=> 'admin.users.create','description'=>'Crear Usuarios'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estados','description'=>'Menu Estados'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadostareas.index','description'=>'Ver Estados Tareas'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadostareas.update','description'=>'Actualizar Estados Tareas'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadostareas.edit','description'=>'Ver Vista Edición Estados Tareas'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadostareas.create','description'=>'Ver Vista Creación Estados Tareas'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadostareas.store','description'=>'Guardar Estados Tareas'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadostareas.enabled','description'=>'Deshabilitar Estados Tareas'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadosproyectos.index','description'=>'Ver Estados Proyectos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadosproyectos.update','description'=>'Actualizar Estados Proyectos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadosproyectos.edit','description'=>'Ver Vista Edición Estados Proyectos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadosproyectos.create','description'=>'Ver Vista Creación Estados Proyectos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadosproyectos.store','description'=>'Guardar Estados Proyectos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.estadosproyectos.enabled','description'=>'Deshabilitar Estados Proyectos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.blogs.index','description'=>'Ver Blogs'])->assignRole($role1);
        Permission::create(['name'=> 'admin.blogs.update','description'=>'Actualizar Blogs'])->assignRole($role1);
        Permission::create(['name'=> 'admin.blogs.edit','description'=>'Editar Blogs'])->assignRole($role1);
        Permission::create(['name'=> 'admin.blogs.create','description'=>'Crear Blogs'])->assignRole($role1);
        Permission::create(['name'=> 'admin.blogs.enabled','description'=>'Deshabilitar Blogs'])->assignRole($role1);
        Permission::create(['name'=> 'admin.procesos.index','description'=>'Ver Procesos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.procesos.update','description'=>'Actualizar Procesos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.procesos.edit','description'=>'Editar Procesos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.procesos.create','description'=>'Crear Procesos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.procesos.destroy','description'=>'Eliminar Procesos'])->assignRole($role1);
        Permission::create(['name'=> 'admin.procesos.enabled','description'=>'Deshabilitar Procesos'])->assignRole($role1);
        

        // Permisos para Usuarios y Administrador
        Permission::create(['name'=> 'admin.home','description'=>'Inicio Home'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.ejes.index','description'=>'Ver Ejes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.ejes.create','description'=>'Ver Vista Creación Ejes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.ejes.edit','description'=>'Ver vista Edición Ejes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.ejes.destroy','description'=>'Eliminar Ejes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.ejes.store','description'=>'Guardar Ejes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.ejes.update','description'=>'Actualizar Ejes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.ejes.enabled','description'=>'Deshabilitar Ejes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.proyectos.index','description'=>'Ver Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.proyectos.create','description'=>'Ver Vista Creación Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.proyectos.edit','description'=>'Ver vista Edición Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.proyectos.destroy','description'=>'Eliminar Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.proyectos.store','description'=>'Guardar Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.proyectos.update','description'=>'Actualizar Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.proyectos.enabled','description'=>'Deshabilitar Proyectos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tareas.index','description'=>'Ver Tareas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tareas.create','description'=>'Ver Vista Creación Tareas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tareas.edit','description'=>'Ver vista Edición Tareas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tareas.destroy','description'=>'Eliminar Tareas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tareas.store','description'=>'Guardar Tareas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tareas.update','description'=>'Actualizar Tareas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tareas.descarga','description'=>'Descargar Archivo'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tareas.deleteFile','description'=>'Eliminar Archivo'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.grupos.index','description'=>'Ver Grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.grupos.create','description'=>'Ver Vista Creación Grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.grupos.edit','description'=>'Ver vista Edición Grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.grupos.destroy','description'=>'Eliminar Grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.grupos.store','description'=>'Guardar Grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.grupos.update','description'=>'Actualizar Grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.grupos.enabled','description'=>'Deshabilitar Grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.estrategicas.index','description'=>'Ver Estrategicas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.estrategicas.create','description'=>'Ver Vista Creación Estrategicas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.estrategicas.edit','description'=>'Ver vista Edición Estrategicas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.estrategicas.destroy','description'=>'Eliminar Estrategicas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.estrategicas.store','description'=>'Guardar Estrategicas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.estrategicas.update','description'=>'Actualizar Estrategicas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.estrategicas.enabled','description'=>'Deshabilitar Estrategicas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.operativas.index','description'=>'Ver Operativas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.operativas.create','description'=>'Ver Vista Creación Operativas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.operativas.edit','description'=>'Ver vista Edición Operativas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.operativas.destroy','description'=>'Eliminar Operativas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.operativas.store','description'=>'Guardar Operativas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.operativas.update','description'=>'Actualizar Operativas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.operativas.enabled','description'=>'Deshabilitar Operativas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.objetivos.index','description'=>'Ver Objetivos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.objetivos.create','description'=>'Ver Vista Creación Objetivos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.objetivos.edit','description'=>'Ver vista Edición Objetivos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.objetivos.destroy','description'=>'Eliminar Objetivos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.objetivos.store','description'=>'Guardar Objetivos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.objetivos.update','description'=>'Actualizar Objetivos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.objetivos.enabled','description'=>'Deshabilitar Objetivos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.actividades.index','description'=>'Ver Actividades'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.actividades.create','description'=>'Ver Vista Creación Actividades'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.actividades.edit','description'=>'Ver vista Edición Actividades'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.actividades.destroy','description'=>'Eliminar Actividades'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.actividades.store','description'=>'Guardar Actividades'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.actividades.update','description'=>'Actualizar Actividades'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.actividades.enabled','description'=>'Deshabilitar Actividades'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.agendas.index','description'=>'Ver Agenda'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.agendas.create','description'=>'Ver Vista Creación Agenda'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.agendas.edit','description'=>'Ver vista Edición Agenda'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.agendas.destroy','description'=>'Eliminar Agenda'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.agendas.store','description'=>'Guardar Agenda'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.agendas.update','description'=>'Actualizar Agenda'])->syncRoles([$role1, $role2]);
        
    }
}
