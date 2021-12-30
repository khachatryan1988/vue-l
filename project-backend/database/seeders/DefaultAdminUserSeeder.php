<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'super-admin@example.com';
        $user->password = bcrypt('123456');
        $user->email_verified_at = now()->toDateTimeString();
        $user->user_type = 1;

        $user->save();
    }
}
