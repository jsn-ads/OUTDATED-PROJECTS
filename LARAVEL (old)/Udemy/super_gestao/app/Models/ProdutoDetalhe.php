<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    use HasFactory;

    protected $fillable = ['id_produto','largura','altura','comprimento','id_unidade'];

    //retorna o produto que o detalhe pertece , filho para pai
    public function produto(){
        return $this->belongsTo('App\Models\Produto');
    }
}
