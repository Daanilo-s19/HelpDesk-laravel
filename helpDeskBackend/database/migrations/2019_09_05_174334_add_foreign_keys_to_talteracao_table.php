<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTalteracaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('talteracao', function(Blueprint $table)
		{
			$table->foreign('id_chamado', 'talteracao_tchamado_id_fk')->references('id')->on('tchamado')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_prioridade', 'talteracao_tprioridade_id_fk')->references('id')->on('tprioridade')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_situacao', 'talteracao_tsituacao_id_fk')->references('id')->on('tsituacao')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_tecnico', 'talteracao_ttecnico_login_fk')->references('login')->on('ttecnico')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('talteracao', function(Blueprint $table)
		{
			$table->dropForeign('talteracao_tchamado_id_fk');
			$table->dropForeign('talteracao_tprioridade_id_fk');
			$table->dropForeign('talteracao_tsituacao_id_fk');
			$table->dropForeign('talteracao_ttecnico_login_fk');
		});
	}

}
