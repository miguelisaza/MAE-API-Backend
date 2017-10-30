<?php

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('roles')->delete();

		// Datos Necesarios
		Rol::create(array(
				'observation' => 'Rol para Administrador',
				'name' => 'Admin',
				'idState' => 1
			));

		// Datos Necesarios
		Rol::create(array(
				'observation' => 'Rol para Profesores',
				'name' => 'Teacher',
				'idState' => 1
			));

	}
}