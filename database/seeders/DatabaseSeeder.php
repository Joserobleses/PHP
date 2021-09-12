<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'manager']);
        Role::create(['name'=>'editor']);

        $admin = User::create([
            'name'=>'jose',
            'email'=>'jrobleses@gmail.com',
            'email_verified_at'=> now(),
            'password'=>bcrypt('password'),
            'remember_token'=> Str::random(10),
        ]);

        $user1 = User::create([
            'name'=>'Benito',
            'email'=>'jrobleses2@gmail.com',
            'email_verified_at'=> now(),
            'password'=>bcrypt('password'),
            'remember_token'=> Str::random(10),
        ]);

        $user2 = User::create([
            'name'=>'Manolo',
            'email'=>'jrobleses3@gmail.com',
            'email_verified_at'=> now(),
            'password'=>bcrypt('password'),
            'remember_token'=> Str::random(10),
        ]);
		
		$admin->assignRole('admin');

        $user1->assignRole('manager');

        $user2->assignRole('editor');
    }
}
