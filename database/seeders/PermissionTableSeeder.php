<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create permissions
        Permission::firstOrCreate(['name'=>'write-a-post']);
        Permission::firstOrCreate(['name'=>'edit-a-post']);
        Permission::firstOrCreate(['name'=>'delete-a-post']);
        // Create roles
        $superAdmin = Role::firstOrCreate(['name'=>'SuperAdmin']);
        $User = Role::firstOrCreate(['name'=>'User']);
        // Give permission to certain role
        $superAdmin->givePermissionTo(['write-a-post', 'edit-a-post', 'delete-a-post']);
        $User->givePermissionTo(['write-a-post']);
        // Assign role to user
        User::find(1)->assignRole(['SuperAdmin']);
        User::find(2)->assignRole('User');
    }
}
