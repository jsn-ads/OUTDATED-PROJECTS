<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request){

        $data = [
            'nome'=>'Jose Alves',
            'email'=>'jsn@email.com',
            'cidade'=>'Goiânia'
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
