<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Contato;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Popular o banco sem a classe Factory
        /*
            $dados = new Contato();
            $dados->nome = "Jose Neto";
            $dados->telefone = "(62)9 99351-8323";
            $dados->email = "jsn.ads@gmail.com";
            $dados->motivo_contato = 1;
            $dados->mensagem = "teste contato 1";
            $dados->save();
        */
        \App\Models\Contato::factory()->count(20)->create();
    }
}
