<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTarefaTableV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarefas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable()->after('id');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('tarefas', function (Blueprint $table) {
            $table->dropForeign('tarefas_id_user_foreign');
            $table->dropColumn('id_user');
        });
        Schema::enableForeignKeyConstraints();
    }
}
