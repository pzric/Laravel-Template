<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role1 = Role::create(['name' => 'Admin']);
      $role2 = Role::create(['name' => 'User']);

      Permission::create(['name' => 'dashboard'])->syncRoles([$role1, $role2]);
      Permission::create(['name' => 'tables'])->syncRoles([$role1,$role2]);
      Permission::create(['name' => 'users'])->syncRoles([$role1]);
    }
}
