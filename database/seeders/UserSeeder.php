<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Data User untuk administrator
         */
        $admin = User::create([
            'name' => 'Administrator Website',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin020412')
        ]);

        $admin->assignRole('admin');

        /**
         * Data User untuk user biasa (pembeli)
         */
        $user = User::create([
            'name' => 'User Website',
            'email' => 'user@user.com',
            'password' => Hash::make('user020412')
        ]);

        $user->assignRole('user');
    }
}
