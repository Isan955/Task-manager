<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{$adminRole = Role::findByName('admin');
    $adminRole->givePermissionTo('view posts');
    $adminRole->givePermissionTo('create posts');
    
    $userRole = Role::findByName('user');
    $userRole->givePermissionTo('view posts');
    $user = User::find(1); // misal pengguna dengan ID 1
    $user->assignRole('admin');
}
}