<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = new Fornecedor();
        $dados->nome = 'Coelgo Engenharia';
        $dados->site = 'www.coelgo.com.br';
        $dados->uf =   'GO';
        $dados->email ='coelgo@gmail.com';
        $dados->save();

        $dados = new Fornecedor();
        $dados->nome = 'Evtek';
        $dados->site = 'www.evtek.com.br';
        $dados->uf =   'GO';
        $dados->email ='evtek@gmail.com';
        $dados->save();

        $dados = new Fornecedor();
        $dados->nome = 'Esus';
        $dados->site = 'www.esus.com.br';
        $dados->uf =   'GO';
        $dados->email ='esus@gmail.com';
        $dados->save();
    }
}
