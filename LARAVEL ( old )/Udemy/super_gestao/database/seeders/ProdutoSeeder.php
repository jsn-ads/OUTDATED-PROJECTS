<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        $produto = new Produto();
        $produto->nome = "Geladeira";
        $produto->descricao = "Geladeira Consul FROSSFREE";
        $produto->peso = 80;
        $produto->id_unidade = 1;
        $produto->save();

        $produto = new Produto();
        $produto->nome = "TV";
        $produto->descricao = "TV Samsung 50 polegadas";
        $produto->peso = 9;
        $produto->id_unidade = 2;
        $produto->save();

        $produto = new Produto();
        $produto->nome = "Notebook";
        $produto->descricao = "Notebook dell 14 polegadas";
        $produto->peso = 2;
        $produto->id_unidade = 3;
        $produto->save();

        $produto = new Produto();
        $produto->nome = "Lavadeira";
        $produto->descricao = "Lavadeira Brastemp 11 kilo";
        $produto->peso = 40;
        $produto->id_unidade = 4;
        $produto->save();
    }
}
