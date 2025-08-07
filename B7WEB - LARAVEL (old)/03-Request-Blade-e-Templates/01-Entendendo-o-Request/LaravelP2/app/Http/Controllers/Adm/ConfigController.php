<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request){

        /*
            filled = verifica se esta setado 
            missing = verifica se esta vazio
            input = pega o valor ou subistitui se nao pega nada ex: $request->input('nome', 'Visitante');


            caso queria pegar apenas campos definidos

                $dados = $request->only(['nome','email']);

            caso nao queria pega os campos definidos
                
                $dados = $request->except(['email']);


        */

        echo ($request->filled('nome'))?'usuario : '.$request->input('nome'):'Campo vazio';

        return view('config');
    }

    public function info(){
        echo "Informacoes";
    }

    public function permissoes(){
        echo "Permissoes";
    }
}
