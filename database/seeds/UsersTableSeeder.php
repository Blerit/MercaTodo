<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Builder\Use_;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        
        $user = new User();
        $user->name     = 'Admin';
        $user->email    = 'admin@email.com';
        $user->password = bcrypt('123123123');
        $user->admin    = true;
        $user->save();
        $user->roles()->attach($adminRole);

        $user = new User();
        $user->name     = 'User';
        $user->email    = 'user@email.com';
        $user->password = bcrypt('123123123');
        $user->save();
        $user->roles()->attach($userRole);
    }
}
