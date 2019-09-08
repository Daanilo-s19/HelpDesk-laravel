<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTproblemaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tproblema', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('descricao', 65535);
			$table->integer('id_setor')->index('tproblema_tsetor_id_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tproblema');
	}

}
