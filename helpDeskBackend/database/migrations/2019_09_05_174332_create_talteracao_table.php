<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTalteracaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('talteracao', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('data');
			$table->text('descricao', 65535);
			$table->string('id_tecnico', 20)->index('talteracao_ttecnico_login_fk');
			$table->integer('id_chamado')->index('talteracao_tchamado_id_fk');
			$table->integer('id_situacao')->index('talteracao_tsituacao_id_fk');
			$table->integer('id_prioridade')->index('talteracao_tprioridade_id_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('talteracao');
	}

}
