<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table){
			$table->foreign('idRol')->references('id')->on('roles')
						->onDelete('no action')
						->onUpdate('no action');
		});

		/*
		 * TODO: Importante para Seguridad: No genera la FK, revisar por qué y reparar.
		 *
		 * alter table sirius.missing add constraint missing_idEstudiante_foreign foreign key (idEstudiante) references estudiantes(id)
		 *

		Schema::table('assistants', function (Blueprint $table){
            $table->foreign('idEstudiante')->references('ID')->on('estudiantes')

        });

		*/
	}

	public function down()
	{
	
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_idRol_foreign');
		});
		
	}
}