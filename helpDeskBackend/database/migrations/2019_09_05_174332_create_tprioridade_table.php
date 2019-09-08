<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTprioridadeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tprioridade', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('descricao', 20)->unique('tprioridade_descricao_uindex');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tprioridade');
	}

}
