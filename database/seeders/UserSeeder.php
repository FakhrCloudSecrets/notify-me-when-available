<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        $user = User::create([
            'name'      => 'User',
            'email'     => 'user@notifyme.com',
            'password'  => Hash::make('password'),
        ]);
        $user->assignRole('user');

        Role::create(['name' => 'admin']);
        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@notifyme.com',
            'password'  => Hash::make('password'),
        ]);
        $admin->assignRole('admin');
    }
}
