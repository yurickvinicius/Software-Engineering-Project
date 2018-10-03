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
<<<<<<< HEAD
=======
            'login'    => 'adm',
>>>>>>> 21d1c8392af21e38b5a78c128fb2dc62667aabbb
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
