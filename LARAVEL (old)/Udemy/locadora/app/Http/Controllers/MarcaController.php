<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Marca;
use App\Repositories\MarcaRepository;



class MarcaController extends Controller
{

    public function __construct(Marca $marca)
    {
        $this->dados = array();
        $this->marca = $marca;
        $this->a = $marca;
    }

    public function index(Request $request)
    {

        $marcasRepository = new MarcaRepository($this->marca);

        if($request->has('atributos_modelos')){
            $marcasRepository->select_atributos('modelos:id,'.$request->atributos_modelos);
        }else{
            $marcasRepository->select_atributos('modelos');
        }

        if($request->has('filtro')){
            $marcasRepository->filtro($request->filtro);
        }

        if($request->has('atributos')){
            $marcasRepository->atributos($request->atributos);
        }

        return response()->json($marcasRepository->paginacao(5),200);


    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate($this->marca->rules(),$this->marca->feedback());

        $this->marca->nome   = utf8_encode(ucwords(strtolower($request->input('nome'))));
        //recupera a imagem
        $this->marca->imagem = $request->file('imagem');
        //salva imagem dentro de storage
        $this->marca->imagem = $this->marca->imagem->store('imagens/marca','public');

        return response($this->marca->save(),200);
    }

    public function show($id)
    {
        return ($this->marca->find($id) != null) ? response($this->marca->with('modelos')->find($id),200) : response(['erro'=>'Marca não encontrada'],404);
    }

    public function edit(Marca $marca)
    {

    }

    public function update(Request $request, $id)
    {

        if($this->marca->find($id) === null){
            return response(['erro'=>'Erro ao Atualizar , Marca não encontrada'],404);
        }

        //Atualizaçao Parcial
        if($request->method() === 'PATCH'){

            $regrasDinamicas = array();

            foreach($this->marca->rules() as $input => $regra){

                if(array_key_exists($input, $request->all())){

                    $regrasDinamicas[$input] = $regra;

                }
            }

            $request->validate($regrasDinamicas, $this->marca->find($id)->feedback());
        //Atualização
        }else{

            $request->validate($this->marca->find($id)->rules(), $this->marca->find($id)->feedback());

        }

        $this->marca = $this->marca->find($id);

        $this->marca->fill($request->all());

        //Caso uma nova imagem seja preenchida a anterior e deletada
        if($request->file('imagem')){

            Storage::disk('public')->delete($this->marca->imagem);

            //Adiciona uma nova imagem

            $im = $request->file('imagem');

            $this->marca->imagem = $im->store('imagens/marca','public');
        }

        return response()->json($this->marca->save(),200);

    }

    public function destroy($id)
    {

        if($this->marca->find($id)){

            $this->marca = $this->marca->find($id);

            Storage::disk('public')->delete($this->marca->imagem);

        }

        return ($this->marca->find($id) != null) ? response($this->marca->find($id)->delete(),200) : response(['erro'=>'Erro ao Deletar , Marca não encontrada'],404);
    }
}
