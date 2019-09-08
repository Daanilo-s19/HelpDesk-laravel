<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTsituacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tsituacao', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 20);
			$table->integer('id_cor')->index('tsituacao_tcor_id_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tsituacao');
	}

}
