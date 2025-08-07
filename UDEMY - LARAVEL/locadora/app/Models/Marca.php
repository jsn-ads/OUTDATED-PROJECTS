<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['nome','imagem'];

    // regras de validação
    public function rules(){
        return [
            'nome'    => 'required|unique:marcas,nome,'.$this->id.'',
            'imagem'  => 'required|file|mimes:png'
        ];
    }

    // reposta de retorno
    public function feedback(){
        return [
            'required'    => 'o campo :attribute e obrigatório',
            'nome.unique' => 'este nome ja esta sendo utilizado',
            'imagem.mimes' => 'erro ao salvar arquivo , somente arquivo png'
        ];
    }

    public function modelos(){
        return $this->hasMany('App\Models\Modelo' , 'id_marca');
    }
}
