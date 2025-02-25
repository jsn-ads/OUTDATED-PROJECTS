<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Repositories\ModeloRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ModeloController extends Controller
{

    public function __construct(Modelo $modelo)
    {
        $this->dados = array();
        $this->modelo = $modelo;
    }

    public function index(Request $request)
    {
        $modeloRepository = new ModeloRepository($this->modelo);

        if($request->has('atributos_modelos')){
            $modeloRepository->select_atributos('marca:id,'.$request->atributos_modelos);
        }else{
            $modeloRepository->select_atributos('marca');
        }

        if($request->has('filtro')){
            $modeloRepository->filtro($request->filtro);
        }

        if($request->has('atributos')){
            $modeloRepository->atributos($request->atributos);
        }

        return response()->json($modeloRepository->get(),200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate($this->modelo->rules(), $this->modelo->feedback());

        $this->modelo->id_marca     =  $request->input('id_marca');
        $this->modelo->nome         =  $request->input('nome');
        $this->modelo->imagem       =  $request->file('imagem');
        $this->modelo->imagem       =  $this->modelo->imagem->store('imagens/modelo','public');
        $this->modelo->np           =  $request->input('np');
        $this->modelo->lugares      =  $request->input('lugares');
        $this->modelo->air_bag      =  $request->input('air_bag');
        $this->modelo->abs          =  $request->input('abs');

        return response()->json($this->modelo->save(),200);

    }

    public function show($id)
    {
        return ($this->modelo->find($id) != null) ? response()->json($this->modelo->with('marca')->find($id),200) : response()->json(['erro' => 'Modelo não encontrado'], 404);
    }

    public function edit(Modelo $modelo)
    {

    }

    public function update(Request $request, $id)
    {

        if($request->method() === "PATCH"){

            $regrasDinamicas = array();

            foreach($this->modelo->rules() as $input => $regra){

                if(array_key_exists($input, $request->all())){

                    $regrasDinamicas[$input] = $regra;

                }
            }

            $request->validate($regrasDinamicas, $this->modelo->find($id)->feedback());

        }else{

            $request->validate($this->modelo->rules(), $this->modelo->feedback());

        }


        if($request->file('imagem')){

            $this->modelo = $this->modelo->find($id);

            Storage::disk('public')->delete($this->modelo->imagem);
        }

        $im = $request->file('imagem');

        $this->modelo->fill($request->all());
        $this->modelo->imagem = $im->store('imagens/modelo', 'public');

        if($request->input('nome')){
            $this->modelo->nome = $request->input('nome');
        }

        return response()->json($this->modelo->save(),200);

    }

    public function destroy($id)
    {

        if($this->modelo->find($id)){

            $this->modelo = $this->modelo->find($id);

            Storage::disk('public')->delete($this->modelo->imagem);

        }

        return ($this->modelo->find($id) != null) ? response()->json($this->modelo->find($id)->delete(),200) : response()->json(['erro'=>'Erro ao Deletar , Modelo não encontrado'],404);
    }
}
