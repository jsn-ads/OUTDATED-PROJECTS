<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['tarefa','data_conclusao','id_user'];

    //validação
    public function rules(){
        return [
            'tarefa' => 'required',
            'data_conclusao' => 'required|date|after:today'
        ];
    }

    //senha de validação
    public function feedback(){
        return [
            'required' => 'O campo :attribute e obrigatório',
            'data_conclusao.after' => 'A data deve ser posterior a data atual'
        ];
    }

    // returna  1 usuario para N tarefas
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
