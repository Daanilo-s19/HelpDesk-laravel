<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTsetorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tsetor', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 80)->unique('tsetor_nome_uindex');
			$table->string('telefone', 11)->unique('tsetor_telefone_uindex');
			$table->string('email', 80)->unique('tsetor_email_uindex');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tsetor');
	}

}
