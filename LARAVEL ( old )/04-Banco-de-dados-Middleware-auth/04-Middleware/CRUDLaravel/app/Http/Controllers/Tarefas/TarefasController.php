<?php

namespace App\Http\Controllers\Tarefas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function index(){

        $lista = Tarefa::all();

        return view('tarefas.index',[
            'tarefas' => $lista
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        
        $request->validate([
            'titulo'=> ['required','string']
        ]);
            
        $titulo =  ucwords(strtolower($request->input('titulo')));

        $t = new Tarefa();
        $t->titulo = $titulo;
        $t->save();

        return redirect()->route('tarefas.index');

    
    }

    public function edit($id){

        $data = Tarefa::find($id);

        if($data){
            return view('tarefas.edit',[
                'data' => $data
            ]);
        }else{
            return redirect()->route('tarefas.index');
        }

        
    }
    
    public function editAction(Request $request , $id){

        $request->validate([
            'titulo'=>['required','string']
        ]);

        $titulo = $request->input('titulo');

        $t = Tarefa::find($id);
        
        if($t){
            $t->titulo = $titulo;
            $t->save();
        }
    
        return redirect()->route('tarefas.index');
            
    }

    public function del($id){

        $t = Tarefa::find($id);
        if($t){
            $t->delete();
        }

        return redirect()->route('tarefas.index');
        
    }

    public function status($id){

        $t = Tarefa::find($id);
        if($t){
            $t->status = 1 - $t->status;
            $t->save();
        }
    
        return redirect()->route('tarefas.index');
    }
}
