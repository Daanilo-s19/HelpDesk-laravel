<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTsituacaoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tsituacao', function (Blueprint $table) {
            $table->foreign('id_cor', 'tsituacao_tcor_id_fk')->references('id')->on('tcor')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tsituacao', function (Blueprint $table) {
            $table->dropForeign('tsituacao_tcor_id_fk');
        });
    }
}
