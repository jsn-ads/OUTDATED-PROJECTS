<?php

// teste para trabalho

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function index(){

        $motivo_contatos = MotivoContato::all();

        return view('site.contato.index',
            [
                'motivo_contatos' => $motivo_contatos
            ]
        );
    }

    //funcao para adicionar contato
    public function add(Request $request){

        $regras = [
            'nome'                  => 'required|min:3|max:40',
            'telefone'              => 'required|max:14',
            'email'                 => 'required|max:100|email',
            'id_motivo_contatos'    => 'required',
            'mensagem'              => 'required|max:250'
        ];

        $msg = [
            //generico
            'required'      => 'o campo :attribute e obrigatorio',
            //especifico
            'nome.min'      => 'o campo nome requer no minino 3 caracteres',
            'nome.max'      => 'o campo nome permite no maximo 40 caracteres',
            'telefone.max'  => 'o campo telefone permite no maximo 14 caracteres',
            'email.max'     => 'o campo email permite no maximo 100 caracteres',
            'email.email'   => 'email invalido',
            'mensagem.max'  => 'o campo mensagem permit no maximo 250 caracteres'

        ];

        //metodo validação
        $request->validate($regras , $msg);

        Contato::create($request->all());

        return redirect()->route('contato');
    }
}
