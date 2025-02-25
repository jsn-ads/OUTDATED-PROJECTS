<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->all(['email','password']);

        //autenticando , true => retorna um token
        $token = auth('api')->attempt($credenciais);

        return ($token) ? response()->json(['token'=>$token] , 200) : response()->json(['error' => "Usuario/Senha Invalidos"],403);

    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['msg'=>'Logout foi realizado com sucesso']);
    }

    public function refresh()
    {
        $token = auth('api')->refresh();

        return response()->json(['token' => $token]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}
