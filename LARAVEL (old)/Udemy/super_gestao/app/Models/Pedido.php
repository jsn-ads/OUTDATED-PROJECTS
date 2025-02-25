<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['id_cliente'];

    // retorna os dados de relacionamento de N pra N , e quantidade de produtos para um pedido
    public function produtos(){
        // metodo WithPivot e utilizado para acessar as colunas da tabela de pedido produtos
        return $this->belongsToMany('App\Models\Produto','pedido_produtos','id_pedido','id_produto')->withPivot('id','created_at');

    }
}
