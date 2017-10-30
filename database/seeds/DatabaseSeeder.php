<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();


		$this->call('RolTableSeeder');
		$this->command->info('Rol table seeded!');

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		


	}
}
