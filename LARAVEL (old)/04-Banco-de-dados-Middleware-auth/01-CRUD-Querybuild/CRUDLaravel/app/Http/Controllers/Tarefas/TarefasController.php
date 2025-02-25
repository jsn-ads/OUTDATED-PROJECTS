<?php

namespace App\Http\Controllers\Tarefas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function index(){

        $lista = DB::select('SELECT * FROM tarefas');

        return view('tarefas.index',[
            'tarefas' => $lista
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        
        if($request->filled('titulo')){
            
            $titulo =  ucwords(strtolower($request->input('titulo')));

            DB::insert('INSERT into tarefas SET titulo = :titulo',
                [
                    'titulo'=>$titulo
                ]);

            return redirect()->route('tarefas.index');
        }else{
            return redirect()->route('tarefas.add')->with('warning','Você não preencheu a tarefa');
        }
    }

    public function edit($id){

        $data = DB::select('SELECT * FROM tarefas WHERE id = :id',[
            'id' => $id
        ]);

        if(count($data) > 0){
            return view('tarefas.edit',[
                'data' => $data[0]
            ]);
        }else{
            return redirect()->route('tarefas.index');
        }

        
    }
    
    public function editAction(Request $request , $id){

        if($request->filled('titulo')){

            $titulo = $request->input('titulo');

            DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id',[
                'titulo'=>$titulo,
                'id'=>$id
            ]);

            return redirect()->route('tarefas.index');
        }else{
            return redirect()->route('tarefas.edit',['id'=>$id])->with('warning','O titulo não foi preenchido');
        }
        
    }

    public function del($id){

        DB::delete('DELETE FROM tarefas WHERE id = :id',[
            'id' => $id
        ]);

        return redirect()->route('tarefas.index');
        
    }

    public function status($id){

        DB::update('UPDATE tarefas SET status = 1 - status WHERE id = :id',[
            'id'=>$id
        ]);

        return redirect()->route('tarefas.index');
    }
}
