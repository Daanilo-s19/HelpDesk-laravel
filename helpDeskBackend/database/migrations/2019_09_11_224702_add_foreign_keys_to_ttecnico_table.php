<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTtecnicoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ttecnico', function (Blueprint $table) {
            $table->foreign('id_setor', 'ttecnico_tsetor_id_fk')->references('id')->on('tsetor')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ttecnico', function (Blueprint $table) {
            $table->dropForeign('ttecnico_tsetor_id_fk');
        });
    }
}
