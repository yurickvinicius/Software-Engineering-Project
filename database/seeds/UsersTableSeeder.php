<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Administrador',
            'login'    => 'admin',
            'email'    => 'admin@gmail.com',
            'type'     => 1,
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name'     => 'Comum',
            'login'    => 'comum',
            'email'    => 'comum@gmail.com',
            'type'     => 2,
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name'     => 'Maria',
            'login'    => 'maria',
            'email'    => 'maria@gmail.com',
            'type'     => 2,
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name'     => 'Pedro',
            'login'    => 'pedro',
            'email'    => 'pedro@gmail.com',
            'type'     => 2,
            'password' => bcrypt('123456'),
        ]);
    }
}
