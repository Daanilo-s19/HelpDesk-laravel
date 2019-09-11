<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTproblemaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tproblema', function (Blueprint $table) {
            $table->foreign('id_setor', 'tproblema_tsetor_id_fk')->references('id')->on('tsetor')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tproblema', function (Blueprint $table) {
            $table->dropForeign('tproblema_tsetor_id_fk');
        });
    }
}
