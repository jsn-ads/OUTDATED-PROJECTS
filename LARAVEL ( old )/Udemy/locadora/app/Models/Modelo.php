<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = ['id_marca','imagem','np','lugares','air_bag','abs'];

    // regras de validação
    public function rules(){
        return [
            'id_marca'=> 'required',
            'nome'    => 'required|unique:modelos,nome,'.$this->id.'',
            'imagem'  => 'required|file|mimes:png,jpeg,jpg',
            'np'      => 'required|integer|digits_between:1,5',
            'lugares' => 'required|integer|digits_between:1,5',
            'air_bag' => 'required|boolean',
            'abs'     => 'required|boolean'
        ];
    }

    // reposta de retorno
    public function feedback(){
        return [
            'required'        => 'o campo :attribute e obrigatório',
            'nome.unique'     => 'este nome ja esta sendo utilizado',
            'imagem.mimes'    => 'erro ao salvar arquivo , somente arquivo png',
            'digits_between'  => 'numero de :attribute e invalido'
        ];
    }

    public function marca(){
        return $this->belongsTo('App\Models\Marca' , 'id_marca');
    }
}
