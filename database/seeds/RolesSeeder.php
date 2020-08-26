<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\{
    Role,
    Permission
};

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'vendedor']);
        $role = Role::create(['name' => 'cliente']);
        $role->givePermissionTo(Permission::all());
    }
}
