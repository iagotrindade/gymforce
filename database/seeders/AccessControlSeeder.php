<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AccessControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create permissions
        Permission::create(['name' => 'add student']);
        Permission::create(['name' => 'edit student']);
        Permission::create(['name' => 'delete student']);

        // create roles and assign existing permissions

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('add student');
        $role2->givePermissionTo('edit student');
        $role2->givePermissionTo('delete student');

        $role3 = Role::create(['name' => 'teacher']);
        $role3->givePermissionTo('add student');
        $role3->givePermissionTo('edit student');
        $role3->givePermissionTo('delete student');

        $role4 = Role::create(['name' => 'student']);
        $role4->givePermissionTo('add student');
        $role4->givePermissionTo('edit student');
        $role4->givePermissionTo('delete student');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
    }
}
