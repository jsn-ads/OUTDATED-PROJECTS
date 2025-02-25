<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjustesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        //como adiciona uma coluna numa tabela ja criada , e colocado ao lado da coluna existente
        Schema::table('fornecedores' , function(Blueprint $table){
            $table->string('site',150)->after('nome')->nullable()->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //removendo coluna
        Schema::table('fornecedores', function(Blueprint $table){
            $table->dropColumn('site');
        });
    }
}
