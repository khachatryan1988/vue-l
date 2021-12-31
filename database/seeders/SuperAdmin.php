<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::firstOrCreate([
            'name'=>'Super Admin',
            'email'=>'super.admin@test.com',
            'password'=>bcrypt('12345678')
        ]);
        User::firstOrCreate([
            'name'=>'User',
            'email'=>'user@test.com',
            'password'=>bcrypt('12345678')
        ]);
        $this->call(UserTypeSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
