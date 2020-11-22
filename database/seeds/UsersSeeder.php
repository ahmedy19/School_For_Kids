<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $adminRole = Role::where('role','admin')->first();
        $editorRole = Role::where('role','editor')->first();
        $creatorRole = Role::where('role','creator')->first();
        $userRole = Role::where('role','user')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $editor = User::create([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $creator = User::create([
            'name' => 'creator',
            'email' => 'creator@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);


        // Attach Roles for Users 
        $admin->roles()->attach($adminRole);
        $editor->roles()->attach($editorRole);
        $creator->roles()->attach($creatorRole);
        $user->roles()->attach($userRole);





    }
}
