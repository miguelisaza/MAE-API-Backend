<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

		// Usuario Test
		User::create(array(
				'fullName' => 'Miguel',
				'idRol' => 1,
				'code' => 'T00032320',
				'password' => 'test',
				'email' => 'elmiguelxd@hotmail.com'
			));
	}
}