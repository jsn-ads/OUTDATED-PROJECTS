<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade',5);
            $table->string('descricao',30);
            $table->timestamps();
        });


        //adiciona o relacionamento com a tabela produtos
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_unidade');
            $table->foreign('id_unidade')->references('id')->on('unidades');
        });

        //adiciona o relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_unidade');
            $table->foreign('id_unidade')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         //remove o relacionamento com a tabela produtos
         Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_id_unidade_foreign');
            $table->dropColumn('id_unidade');
        });

        //remove o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign('produto_detalhes_id_unidade_foreign');
            $table->dropColumn('id_unidade');
        });

        Schema::dropIfExists('unidades');
    }
}
