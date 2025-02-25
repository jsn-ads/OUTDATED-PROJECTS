<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Psy\CodeCleaner\IssetPass;

class LoginController extends Controller
{
    public function index(Request $request){

        switch($request->valor){
            case 1:
                $error = 'Usuario ou Senha inválidos';
                break;
            case 2:
                $error = 'Necessario fazer o login';
                break;
            default:
                $error = '';
                break;
        }

        return view('site.login.index', ['error' => $error]);
    }

    public function autenticar(Request $request){

        // regras de validação
        $regras = [
            'usuario' => 'required|email',
            'senha'   => 'required'
        ];

        // mensagens de retorno
        $msg =[
            'required' => 'o campo :attribute e obrigatorio',
            'usuario.email'  => 'este não e um email valido'
        ];

        // vadilar requisição
        $request->validate($regras, $msg);

        $email = $request->usuario;
        $senha = $request->senha;

        $usuario = User::where('email', $email)->where('password',$senha)->get()->first();

        if(Isset($usuario->name)){

            session_start();

            $_SESSION['name']  = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app');

        }else{
            return redirect()->route('login',['valor' => 1]);
        }

    }

    public function sair(){
        session_destroy();
        return redirect()->route('inicio');
    }
}
