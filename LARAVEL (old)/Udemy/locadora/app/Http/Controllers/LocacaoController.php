<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use App\Repositories\LocacaoRepository;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    public function __construct(Locacao $locacao)
    {
        $this->locacao = $locacao;
    }

    public function index(Request $request)
    {
        $locacaoRepository = new LocacaoRepository($this->locacao);

        if($request->has('filtro'))
        {
            $locacaoRepository->filtro($request->filtro);
        }

        if($request->has('atributos'))
        {
            $locacaoRepository->atributos($request->atributos);
        }

        return response()->json($locacaoRepository->get(),200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate($this->locacao->rules(), $this->locacao->feedback());

        $this->locacao->id_cliente     =  $request->input('id_cliente');
        $this->locacao->id_carro       =  $request->input('id_carro');
        $this->locacao->data_inicio    =  $request->input('data_inicio');
        $this->locacao->data_previsto  =  $request->input('data_previsto');
        $this->locacao->data_final     =  $request->input('data_final');
        $this->locacao->valor_diaria   =  $request->input('valor_diaria');
        $this->locacao->km_inicial     =  $request->input('km_inicial');
        $this->locacao->km_final       =  $request->input('km_final');

        return response()->json($this->locacao->save(),200);
    }

    public function show($id)
    {
        return ($this->locacao->find($id) != null) ? response()->json($this->locacao->find($id),200) : response()->json(['erro' => 'locacao não encontrado'], 404);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        if($request->method() === "PATCH")
        {

            $regrasDinamicas = array();

            foreach($this->locacao->rules() as $input => $regra)
            {

                if(array_key_exists($input, $request->all()))
                {

                    $regrasDinamicas[$input] = $regra;

                }
            }

            $request->validate($regrasDinamicas, $this->locacao->find($id)->feedback());

        }
        else
        {

            $request->validate($this->locacao->rules(), $this->locacao->feedback());

        }

        $this->locacao = $this->locacao->find($id);

        $this->locacao->fill($request->all());

        return response()->json($this->locacao->save(),200);
    }

    public function destroy($id)
    {
        return ($this->locacao->find($id) != null) ? response()->json($this->locacao->find($id)->delete(),200) : response()->json(['erro'=>'Erro ao Deletar , Locacao não encontrado'],404);
    }
}
