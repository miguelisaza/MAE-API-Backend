<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('idRol')->references('id')->on('roles')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
	
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_idRol_foreign');
		});
		
	}
}