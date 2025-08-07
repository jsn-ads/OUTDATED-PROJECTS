<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class UpdateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //alterando campo chave estrangeiras e unicas sem perde as referencias


        //cria a nova coluna e posiciona ela ao lado da coluna que sera deletada
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_id')->after('id_produto');
        });

        //passa os dados da antiga coluna para nova
        DB::statement('update produto_detalhes set produto_id = id_produto');

        //remove a ligação da chave estrangeira em seguida deleta a coluna
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign('produto_detalhes_id_produto_foreign');
            $table->dropColumn('id_produto');
        });

        //adiciona a chave estrageira e unica a nova coluna
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_produto')->after('produto_id');
        });

        DB::statement('update produto_detalhes set id_produto = produto_id');

        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign('produto_detalhes_produto_id_foreign');
            $table->dropColumn('produto_id');
        });

        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->unique('id_produto');
        });
    }
}
