<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Roles untuk Administrator
         */
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        /**
         * Roles untuk User
         */
        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);
    }
}
