<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTusuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tusuario', function(Blueprint $table)
		{
			$table->string('cpf', 11)->primary();
			$table->string('email', 80)->unique('tuser_email_uindex');
			$table->string('telefone', 11)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tusuario');
	}

}
