<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Repositories\CarroRepository;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function __construct(Carro $carro)
    {
        $this->carro = $carro;
    }

    public function index(Request $request)
    {
        $carroRepository = new CarroRepository($this->carro);

        if($request->has('atributos_modelo'))
        {
            $carroRepository->select_atributos('modelo:id,'.$request->atributos_modelo);
        }
        else
        {
            $carroRepository->select_atributos('modelo');
        }

        if($request->has('filtro'))
        {
            $carroRepository->filtro($request->filtro);
        }

        if($request->has('atributos'))
        {
            $carroRepository->atributos($request->atributos);
        }

        return response()->json($carroRepository->get(), 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate($this->carro->rules(), $this->carro->feedback());

        $this->carro->id_modelo  = $request->input('id_modelo');

        $this->carro->placa      = $request->input('placa');

        $this->carro->disponivel = $request->input('disponivel');

        $this->carro->km         = $request->input('km');

        return response($this->carro->save(),200);
    }

    public function show($id)
    {
        return ($this->carro->find($id) != null) ? response($this->carro->with('modelo')->find($id) , 200) : response(['erro'=>'Carro não encontrado']);
    }

    public function edit(Carro $carro)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if($this->carro->find($id) === null)
        {
            return response(['erro' => 'Erro ao Atualizar , Carro não encontrado'],404);
        }

        if($request->method() === 'PATCH')
        {

            $regrasDinamicas = array();

            foreach($this->carro->rules() as $input => $regra)
            {
                if(array_key_exists($input , $request->all()))
                {
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas, $this->carro->find($id)->feedback());
        }
        else
        {
            $request->validate($this->carro->find($id)->rules(), $this->carro->find($id)->feedback());
        }

        $this->carro = $this->carro->find($id);

        $this->carro->fill($request->all());

        return response()->json($this->carro->save(),200);

    }

    public function destroy($id)
    {
        return ($this->carro->find($id) != null) ? response($this->carro->find($id)->delete(),200) : response(['erro'=>'Erro ao Deletar, Cliente não encontrada'],404);
    }
}
