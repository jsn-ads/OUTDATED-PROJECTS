<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\InputBag;

class ConfigController extends Controller
{
    public function index(Request $request){

        $nome = $request->input('nome');
        $idade = $request->input('idade');
        $email = $request->input('email');
        $cidade = $request->input('cidade');

        $data = [
            'usuarios'=>[
                'nome'=>$nome,
                'idade'=>$idade,
                'email'=>$email,
                'cidade'=>$cidade
            ]
            
        ];


        return view('adm.config', $data);
    }

    public function info(){
        echo "Informacoes";
    }

    public function permissoes(){
        echo "Permissoes";
    }
}
