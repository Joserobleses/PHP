<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

use App\Models\User;

use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */


     /*

     PHPM12 - Nivell 2 - Exercici 4   
     Defineix sistema de rols i bloqueja el accés a les diferents vistes segons 
     el seu nivell de privilegis.

     */
    public function run()
    {
      
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'manager']);
        Role::create(['name'=>'editor']);

        $admin = User::create([
            'name' =>'admin',
            'email' =>'jrobleses@gmail.com',
            'email_verified_at' => now(),
            'password' =>bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        $user1 = User::create([
            'name' =>'jose',
            'email' =>'jrobleses2@gmail.com',
            'email_verified_at' => now(),
            'password' =>bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        $user2 = User::create([
            'name' =>'joseEditor',
            'email' =>'jrobleses3@gmail.com',
            'email_verified_at' => now(),
            'password' =>bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('admin');

        $user1->assignRole('manager');

        $user2->assignRole('editor');
    }
}
