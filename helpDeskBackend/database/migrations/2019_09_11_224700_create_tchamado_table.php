<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTchamadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tchamado', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('descricao', 65535);
			$table->dateTime('data')->nullable();
			$table->boolean('ti');
			$table->string('tombo', 20)->nullable();
			$table->string('id_tecnico', 20)->nullable()->index('tchamado_ttecnico_login_fk');
			$table->string('id_usuario', 11)->index('tchamado_tusuario_cpf_fk');
			$table->integer('id_setor')->index('tchamado_tsetor_id_fk');
			$table->integer('id_problema')->nullable()->index('tchamado_tproblema_id_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tchamado');
	}

}
