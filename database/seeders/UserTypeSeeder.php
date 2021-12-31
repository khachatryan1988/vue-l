<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin_type = new UserType();
        $super_admin_type->name = 'SUPER_ADMIN';

        $user_type = new UserType();
        $user_type->name = 'USER';

        $super_admin_type->save();
        $user_type->save();
    }
}
