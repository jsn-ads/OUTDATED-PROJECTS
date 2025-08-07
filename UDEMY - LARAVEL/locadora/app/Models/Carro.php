<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    protected $fillable = ['id_modelo','placa','disponivel','km'];

    public function rules()
    {
        return
        [
            'id_modelo'  => 'required',
            'placa'      => 'required',
            'disponivel' => 'required|boolean',
            'km'         => 'required|integer'
        ];
    }

    public function feedback()
    {
        return
        [
            'required'  => 'o campo :attribute e obrigatorio',
            'boolean'   => 'o campo :attribute deve ser booleano',
            'interger'  => 'o campo :attribute deve ser numerico'
        ];
    }

    public function modelo()
    {
        return $this->belongsTo('App\Models\Modelo' , 'id_modelo');
    }
}
