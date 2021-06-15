<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create_shops']);
        Permission::create(['name' => 'list_shops']);
        Permission::create(['name' => 'create_pictures']);
        Permission::create(['name' => 'show_pictures']);
        Permission::create(['name' => 'destroy_pictures']);
        

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Administrator']);
        $role1->givePermissionTo('create_shops');
        $role1->givePermissionTo('list_shops');
        $role1->givePermissionTo('create_pictures');
        $role1->givePermissionTo('show_pictures');
        $role1->givePermissionTo('destroy_pictures');

        $role2 = Role::create(['name' => 'Manager']);
        $role2->givePermissionTo('list_shops');
        $role2->givePermissionTo('show_pictures');

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Administrator User',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret123'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => bcrypt('secret123'),
        ]);
        $user->assignRole($role2);

    }
}
