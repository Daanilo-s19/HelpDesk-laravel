<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTtecnicoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ttecnico', function(Blueprint $table)
		{
			$table->string('login', 20)->primary();
			$table->string('nome', 80);
			$table->string('email', 80)->unique('ttecnico_email_uindex');
			$table->string('telefone', 11)->nullable();
			$table->integer('id_setor')->index('ttecnico_tsetor_id_fk');
			$table->char('cargo', 1)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ttecnico');
	}

}
