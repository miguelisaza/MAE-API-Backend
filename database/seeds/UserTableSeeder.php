<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

		// Usuarios  Admin Seeder
		User::create(array(
				'fullName' => 'Miguel',
				'idRol' => 1,
				'code' => 'T00032320',
				'password' => 'xxxxxx',
				'email' => 'elmiguelxd@hotmail.com'
			));
		User::create(array(
				'fullName' => 'Eduardo Garcia',
				'idRol' => 1,
				'code' => 'T00036117',
				'password' => 'xxxxxx',
				'email' => 'maiil@mail.com'
			));
        User::create(array(
            'fullName' => 'Juan David Casseres',
            'idRol' => 1,
            'code' => 'T00026138',
            'password' => 'xxxxxx',
            'email' => 'maiil@mail.com'
        ));
        User::create(array(
            'fullName' => 'Jose David Ballesteros',
            'idRol' => 1,
            'code' => 'T00018450',
            'password' => 'xxxxxx',
            'email' => 'maiil@mail.com'
        ));
        User::create(array(
            'fullName' => 'Jaime Negrete',
            'idRol' => 1,
            'code' => 'T00038310',
            'password' => 'xxxxxx',
            'email' => 'maiil@mail.com'
        ));
        User::create(array(
            'fullName' => '-',
            'idRol' => 1,
            'code' => 'T00032320',
            'password' => 'xxxxxx',
            'email' => 'maiil@mail.com'
        ));
        User::create(array(
            'fullName' => 'Jairo Serrano',
            'idRol' => 1,
            'code' => 'T00010915',
            'password' => 'xxxxxx',
            'email' => 'maiil@mail.com'
        ));
        User::create(array(
            'fullName' => 'Andres Benavides',
            'idRol' => 1,
            'code' => 'T00038399',
            'password' => 'xxxxxx',
            'email' => 'maiil@mail.com'
        ));
        User::create(array(
            'fullName' => 'Alvaro Hernandez',
            'idRol' => 1,
            'code' => 'T00037790',
            'password' => 'xxxxxx',
            'email' => 'maiil@mail.com'
        ));
        User::create(array(
            'fullName' => 'Ivis Discuvich',
            'idRol' => 1,
            'code' => 'T00034581',
            'password' => 'xxxxxx',
            'email' => 'maiil@mail.com'
        ));
        User::create(array(
            'fullName' => 'Danilo Diaz',
            'idRol' => 1,
            'code' => 'T00033375',
            'password' => 'xxxxxx',
            'email' => 'maiil@mail.com'
        ));
	}
}