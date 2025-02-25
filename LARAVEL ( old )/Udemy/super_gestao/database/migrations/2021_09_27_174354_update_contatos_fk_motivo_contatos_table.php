<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateContatosFkMotivoContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //adicionado coluna id_motivo_contatos
        Schema::table('contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_motivo_contatos')->after('email');
        });

        //atribuindo motivo_contato para nova coluna id_motivo_contato
        DB::statement('update contatos set id_motivo_contatos = motivo_contato');

        //transformando id_motivo_contato em chave foreign e removendo coluna motivo_contato
        Schema::table('contatos', function (Blueprint $table) {
            $table->foreign('id_motivo_contatos')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //recria coluna motivo_contatos e deleta a chave estrangeira
        Schema::table('contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('contatos_id_motivo_contatos_foreign');
        });

        //popula a coluna motivo_contato
        DB::statement('update contatos set motivo_contato = id_motivo_contatos');

        //deleta a coluna id_motivo_contato
        Schema::table('contatos', function (Blueprint $table) {
            $table->dropColumn('id_motivo_contatos');
        });
    }
}
