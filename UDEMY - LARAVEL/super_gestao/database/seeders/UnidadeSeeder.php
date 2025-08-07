<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{

    public function run()
    {
        $unidade = new Unidade();
        $unidade->unidade = "ONE";
        $unidade->descricao = "primeira unidade";
        $unidade->save();

        $unidade = new Unidade();
        $unidade->unidade = "TWO";
        $unidade->descricao = "segunda unidade";
        $unidade->save();

        $unidade = new Unidade();
        $unidade->unidade = "TREE";
        $unidade->descricao = "terceira unidade";
        $unidade->save();

        $unidade = new Unidade();
        $unidade->unidade = "FOUR";
        $unidade->descricao = "quarta unidade";
        $unidade->save();
    }
}
