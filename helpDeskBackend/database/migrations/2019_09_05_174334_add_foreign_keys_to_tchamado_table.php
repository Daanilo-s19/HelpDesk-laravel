<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTchamadoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tchamado', function (Blueprint $table) {

            $table->foreign('id_setor', 'tchamado_tsetor_id_fk')->references('id')->on('tsetor')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_tecnico', 'tchamado_ttecnico_login_fk')->references('login')->on('ttecnico')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_usuario', 'tchamado_tusuario_cpf_fk')->references('cpf')->on('tusuario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tchamado', function (Blueprint $table) {
            $table->dropForeign('tchamado_tsetor_id_fk');
            $table->dropForeign('tchamado_ttecnico_login_fk');
            $table->dropForeign('tchamado_tusuario_cpf_fk');
        });
    }
}
