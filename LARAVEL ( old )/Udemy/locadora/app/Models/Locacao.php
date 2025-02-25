<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    use HasFactory;

    protected $table = 'locacoes';

    protected $fillable =
    [
        'id_cliente',
        'id_carro',
        'data_inicio',
        'data_previsto',
        'data_final',
        'valor_diaria',
        'km_inicial',
        'km_final'
    ];

    public function rules()
    {
        return
        [
            'id_cliente'    => 'required',
            'id_carro'      => 'required',
            'data_inicio'    => 'required|date',
            'data_previsto' => 'date',
            'data_final'    => 'date',
            'valor_diaria'  => 'required',
            'km_inicial'    => 'required|integer',
            'km_final'      => 'required|integer'

        ];
    }

    public function feedback()
    {
        return
        [
            'required' => 'o campo :attribute e obrigatorio',
            'date' => 'Informe uma data valida',
            'integer' => "Informe apenas Numeros"
        ];
    }
}
