<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fornecedor extends Model
{
    //Biblioteca utilizada para deletar dados de modo suave , onde apenas oculta registros
    use SoftDeletes;
    use HasFactory;

    //o atributo table sobrepoem a nomeação automatica do eloquent
    protected $table = 'fornecedores';

    protected $fillable = ['nome','site','uf','email'];

    //retorna dados de todos os produtos de um unico fornecedor FK , 1 para N
    public function produto(){
        return $this->hasMany('App\Models\Produto','id_fornecedor','id');
    }
}
