<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTarefasTableV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarefas', function (Blueprint $table) {
            $table->string('tarefa',200)->after('id');
            $table->date('data_conclusao')->after('tarefa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('tarefas', function (Blueprint $table) {
           $table->dropColumn('data_conclusao');
           $table->dropColumn('tarefa');
       });
    }
}
