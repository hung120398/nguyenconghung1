<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole=Role::where('name','admin')->first();
        $authorRole=Role::where('name','thuthu')->first();
        $userRole=Role::where('name','user')->first();
        $admin=User::create([
            'name'=>'Admin User',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('123456'),
        ]);
        $author=User::create([
            'name'=>'Author User',
            'email'=>'author@author.com',
            'password'=>Hash::make('123456'),
        ]);
        $user=User::create([
            'name'=>'User',
            'email'=>'user@user.com',
            'password'=>Hash::make('123456'),
        ]);

        $admin->roles()->attach( $adminRole);
        $author->roles()->attach( $authorRole);
        $user->roles()->attach( $userRole);


    }
}
