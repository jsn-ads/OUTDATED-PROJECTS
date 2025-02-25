<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Fornecedor;
use Facade\FlareClient\Http\Response;

class AppFornecedorController extends Controller
{
    //Fornecedor Home
    public function index(){

        return view('app.fornecedor.index');
    }

    //Carrega tela de cadastro e edição
    public function adicionar(){
        return view('app.fornecedor.adicionar');
    }

    //metodo de adicionar editar
    public function add(Request $request){

        //verifica se o token csrf foi enviado
        if($request->_token != ''){

            $regras = [
                'nome'  => 'required|min:3',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'required|email'
            ];

            $feed =[
                'required'  => 'o campo :attribute precisa ser preenchido',
                'nome.min'  => 'o campo nome deve ter no minimo 3 caracteres',
                'uf.min'    => 'o campo uf deve ter apenas 2 caracteres',
                'uf.max'    => 'o campo uf deve ter apenas 2 caracteres',
                'email.email' => 'o email e invalido',
            ];

            $request->validate($regras, $feed);

            //verifica se objeto possui ID , se possui atualiza se não apenas cadastra
            if($request->input('id') == ''){
                Fornecedor::create($request->all());
                $msg = "Fornecedor foi Adicionado";

            }else{
                $dados = Fornecedor::find($request->input('id'));
                $dados->update($request->all());
                $msg = "Fornecedor foi Atualizado";
            }
        }

        return redirect()->route('app.fornecedor.listar',['msg' => $msg]);

    }

    //lista os fornecedores
    public function listar(Request $request , $msg = ''){

        $dados = Fornecedor::where('nome',   'like', '%'.$request->input('nome').'%')
                             ->where('site', 'like', '%'.$request->input('site').'%')
                             ->where('uf',   'like', '%'.$request->input('uf').'%')
                             ->where('email','like', '%'.$request->input('email').'%')
                             ->paginate(10);

        return view('app.fornecedor.listar', [
            'fornecedores'=>$dados,
            'request' => $request->all(),
            'msg' => $msg
        ]);
    }

    //verifica se o fornecedor existe -> carrega para tela adicionar se não carrega para tela de lista
    public function editar($id){

        $dados = Fornecedor::find($id);

        if($dados){

            return view('app.fornecedor.adicionar', [
                'fornecedor' => $dados
            ]);

        }else{

            $msg = "Fornecedor não encontrado";

            return redirect('app.fornecedor.listar', [
                'msg' => $msg
            ]);

        }

    }

    public function excluir($id){

        $msg = "Fornecedor excluido com sucesso";

        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor.listar',['msg' => $msg]);

    }
    
}
