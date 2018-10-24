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
            'login'    => 'adm',
            'email'    => 'admin@gmail.com',
            'type'     => 1,
            'password' => bcrypt('123456'),
        ]);
    }
}
