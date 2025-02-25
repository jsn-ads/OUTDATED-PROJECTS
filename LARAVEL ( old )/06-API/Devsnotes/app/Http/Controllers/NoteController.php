<?php

namespace App\Http\Controllers;


use App\Models\Note;

use Illuminate\Http\Request;

class NoteController extends Controller
{

    private $array = ['error' => '', 'result'=> []];

    public function all(){

        $dados = Note::all();

        foreach($dados as $note){
            $this->array['result'][] = [
                'id' => $note->id,
                'title' => $note->title
            ];
        }

        return $this->array;
    }


    public function one($id){

        $note = Note::find($id);

        if($note){
            $this->array['result'] = $note;
        }else{
            $this->array['error']= 'Nota nao encontrada';
        }

        return $this->array;
    }

    public function new(Request $request){

        $title = $request->input('title');
        $body = $request->input('body');

        if($title && $body){

            $note = new Note();
            $note->title = $title;
            $note->body = $body;
            $note->save();

            $this->array['result'] = [
                'id' => $note->id,
                'title' => $note->title,
                'body' => $note->body
            ];

        }else{
            $this->array['error'] = "Error : Nota nao adicionada";
        }

        return $this->array;
    }

    public function edit(Request $request, $id){

        $title = $request->input('title');
        $body = $request->input('body');

        if($id && $title && $body){

            $note = Note::find($id);

            if($note){

                $note->title = $title;
                $note->body = $body;
                $note->save();

                $this->array['result'] = [
                    'id' => $note->id,
                    'title' => $note->title,
                    'body' => $note->body
                ];

            }else{
                $this->array['error'] = "Error: Nota nao encontrada";
            }

        }else{

            $this->array['error'] = "Error: Nota nao atualizada";
        }

        return $this->array;
    }

    public function delete($id){

        $note = Note::find($id);

        if($note){

            $note->delete();

        }else{
            $this->array['error'] = "Nota não encontrada";
        }

        return $this->array;
    }
}
