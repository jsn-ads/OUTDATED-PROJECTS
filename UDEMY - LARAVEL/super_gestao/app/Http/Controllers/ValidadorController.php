<?php

namespace App\Http\Controllers;

//Classe de vaidação

class ValidadorController extends Controller
{
    //metodo de criar regras
    public static function regras($request){

        $regras = array();

        //lista de validação
        $lista = [
            'nome' => 'required|min:3|max:100',
            'id_cliente' => 'exists:clientes,id',
            'id_produto' => 'exists:produtos,id'
        ];

        //metodo para pegar campos para validar
        foreach(array_keys($request->all()) as $dado){
            //compara chave do array com a chave da lista de validação
            if(in_array($dado, array_keys($lista))){
                $regras[$dado] = $lista[$dado];
            }
        }

        return $regras;
    }

    //mensagens de retorno
    public static function feed(){

        $feed = [
            'required' => 'o campo :attribute e obrigatorio',
            'nome.min' => 'o campo Nome deve ter no minimo 3 caracteres',
            'nome.max' => 'o campo Nome deve ter no maximo 100 caracteres',
            'id_cliente.exists' => 'Selecione um cliente existente',
            'id_produto.exists' => 'Selecione um produto existente'
        ];

        return $feed;
    }
}
